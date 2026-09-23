<?php

namespace App\Controllers;

use App\Models\KaredokModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\ReviewModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class KaredokController extends BaseController
{
    protected $karedokModel;
    protected $categoryModel;
    protected $orderModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->karedokModel  = new KaredokModel();
        $this->categoryModel = new CategoryModel();
        $this->orderModel    = new OrderModel();
        $this->reviewModel   = new ReviewModel();
    }

    /**
     * Homepage with Modern Fast Food Layout & Dynamic Sorting
     */
    public function index()
    {
        $categorySlug = $this->request->getGet('category') ?? 'all';
        $sort         = $this->request->getGet('sort') ?? 'default';
        $search       = $this->request->getGet('q');

        $items      = $this->karedokModel->getFilteredItems($categorySlug, $sort, $search);
        $categories = $this->categoryModel->findAll();
        $featured   = $this->karedokModel->where('is_featured', 1)->first();

        $data = [
            'title'            => 'KAREDOK.CO - Kuliner Khas Jawa Barat Level World-Class',
            'items'            => $items,
            'categories'       => $categories,
            'activeCategory'   => $categorySlug,
            'currentSort'      => $sort,
            'searchQuery'      => $search,
            'featured'         => $featured,
        ];

        return view('karedok/index', $data);
    }

    /**
     * Detail Item (JSON API for Quick Modal / Dedicated View)
     */
    public function detail($id = null)
    {
        $item = $this->karedokModel->select('karedok_items.*, categories.name as category_name')
                                  ->join('categories', 'categories.id = karedok_items.category_id')
                                  ->where('karedok_items.id', $id)
                                  ->first();

        if (!$item) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON(['status' => false, 'message' => 'Menu tidak ditemukan']);
            }
            throw new PageNotFoundException("Menu Karedok ID {$id} tidak ditemukan");
        }

        $reviews = $this->reviewModel->where('karedok_id', $id)->orderBy('id', 'DESC')->findAll();
        $item['reviews'] = $reviews;

        if ($this->request->isAJAX()) {
            return $this->response->setJSON(['status' => true, 'data' => $item]);
        }

        return view('karedok/detail', [
            'title' => $item['name'] . ' - KAREDOK.CO',
            'item'  => $item,
        ]);
    }

    /**
     * Admin Dashboard - Menu CRUD List
     */
    public function admin()
    {
        $search = $this->request->getGet('q');
        $sort   = $this->request->getGet('sort') ?? 'default';

        $items = $this->karedokModel->getFilteredItems('all', $sort, $search);

        return view('karedok/admin', [
            'title'       => 'Admin Panel - Kelola Menu Karedok',
            'items'       => $items,
            'searchQuery' => $search,
            'currentSort' => $sort,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        $categories = $this->categoryModel->findAll();

        return view('karedok/create', [
            'title'      => 'Tambah Menu Karedok Baru',
            'categories' => $categories,
            'validation' => \Config\Services::validation(),
        ]);
    }

    /**
     * Store New Item with Form Validation
     */
    public function store()
    {
        $rules = [
            'name'        => [
                'rules'  => 'required|min_length[3]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama menu karedok wajib diisi.',
                    'min_length' => 'Nama menu minimal 3 karakter.',
                ],
            ],
            'category_id' => [
                'rules'  => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => 'Pilih kategori menu.',
                ],
            ],
            'price'       => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih besar dari 0.',
                ],
            ],
            'spice_level' => [
                'rules'  => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[5]',
                'errors' => [
                    'required' => 'Tingkat pedas wajib ditentukan (0-5).',
                ],
            ],
            'description' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi wajib diisi.',
                    'min_length' => 'Deskripsi minimal 10 karakter.',
                ],
            ],
            'image'       => [
                'rules'  => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        $imageName = 'karedok_hero.jpg';

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads/karedok', $imageName);
        }

        $this->karedokModel->save([
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
            'ingredients' => $this->request->getPost('ingredients'),
            'price'       => $this->request->getPost('price'),
            'spice_level' => $this->request->getPost('spice_level'),
            'rating'      => 5.00,
            'image'       => $imageName,
            'badge'       => $this->request->getPost('badge') ?: 'MENU BARU',
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'status'      => $this->request->getPost('status') ?: 'available',
        ]);

        return redirect()->to('/admin')->with('success', 'Menu Karedok berhasil ditambahkan!');
    }

    /**
     * Edit Form
     */
    public function edit($id = null)
    {
        $item = $this->karedokModel->find($id);
        if (!$item) {
            throw new PageNotFoundException("Menu Karedok ID {$id} tidak ditemukan");
        }

        $categories = $this->categoryModel->findAll();

        return view('karedok/edit', [
            'title'      => 'Edit Menu: ' . $item['name'],
            'item'       => $item,
            'categories' => $categories,
            'validation' => \Config\Services::validation(),
        ]);
    }

    /**
     * Update Item with Form Validation
     */
    public function update($id = null)
    {
        $item = $this->karedokModel->find($id);
        if (!$item) {
            throw new PageNotFoundException("Menu Karedok ID {$id} tidak ditemukan");
        }

        $rules = [
            'name'        => 'required|min_length[3]|max_length[150]',
            'category_id' => 'required|is_natural_no_zero',
            'price'       => 'required|numeric|greater_than[0]',
            'spice_level' => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[5]',
            'description' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $item['image'];

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads/karedok', $imageName);
        }

        $this->karedokModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
            'ingredients' => $this->request->getPost('ingredients'),
            'price'       => $this->request->getPost('price'),
            'spice_level' => $this->request->getPost('spice_level'),
            'image'       => $imageName,
            'badge'       => $this->request->getPost('badge'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin')->with('success', 'Menu Karedok berhasil diperbarui!');
    }

    /**
     * Delete Item
     */
    public function delete($id = null)
    {
        $item = $this->karedokModel->find($id);
        if ($item) {
            $this->karedokModel->delete($id);
            return redirect()->to('/admin')->with('success', 'Menu Karedok berhasil dihapus.');
        }
        return redirect()->to('/admin')->with('error', 'Menu gagal dihapus.');
    }

    /**
     * Checkout Processing with Form Validation
     */
    public function checkout()
    {
        $rules = [
            'customer_name'    => 'required|min_length[3]',
            'customer_phone'   => 'required|min_length[8]',
            'customer_address' => 'required|min_length[5]',
            'payment_method'   => 'required',
            'order_items'      => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $discount = 0;
        $promoCode = strtoupper(trim($this->request->getPost('promo_code') ?? ''));
        if ($promoCode === 'KAREDOKJUARA') {
            $discount = 10000;
        } elseif ($promoCode === 'SUNDA50') {
            $discount = 5000;
        }

        $orderCode = 'KRDK-' . strtoupper(substr(md5(uniqid()), 0, 8));
        
        $this->orderModel->save([
            'order_code'       => $orderCode,
            'customer_name'    => $this->request->getPost('customer_name'),
            'customer_phone'   => $this->request->getPost('customer_phone'),
            'customer_address' => $this->request->getPost('customer_address'),
            'order_items'      => $this->request->getPost('order_items'),
            'total_amount'     => $this->request->getPost('total_amount'),
            'discount'         => $discount,
            'payment_method'   => $this->request->getPost('payment_method'),
            'notes'            => $this->request->getPost('notes'),
            'status'           => 'pending',
        ]);

        return $this->response->setJSON([
            'status'     => true,
            'order_code' => $orderCode,
            'message'    => 'Pesanan Karedok Anda berhasil dibuat! Tim dapur kami sedang meracik karedok segar Anda.',
        ]);
    }
}
