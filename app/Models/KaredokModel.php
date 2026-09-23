<?php

namespace App\Models;

use CodeIgniter\Model;

class KaredokModel extends Model
{
    protected $table            = 'karedok_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'name',
        'slug',
        'description',
        'ingredients',
        'price',
        'spice_level',
        'rating',
        'reviews_count',
        'image',
        'badge',
        'is_featured',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get items with category join and flexible sorting
     */
    public function getFilteredItems($categorySlug = null, $sort = 'default', $search = null)
    {
        $builder = $this->select('karedok_items.*, categories.name as category_name, categories.slug as category_slug')
                        ->join('categories', 'categories.id = karedok_items.category_id');

        if (!empty($categorySlug) && $categorySlug !== 'all') {
            $builder->where('categories.slug', $categorySlug);
        }

        if (!empty($search)) {
            $builder->groupStart()
                    ->like('karedok_items.name', $search)
                    ->orLike('karedok_items.description', $search)
                    ->orLike('karedok_items.ingredients', $search)
                    ->groupEnd();
        }

        switch ($sort) {
            case 'price_low':
                $builder->orderBy('karedok_items.price', 'ASC');
                break;
            case 'price_high':
                $builder->orderBy('karedok_items.price', 'DESC');
                break;
            case 'spice_high':
                $builder->orderBy('karedok_items.spice_level', 'DESC');
                break;
            case 'rating':
                $builder->orderBy('karedok_items.rating', 'DESC');
                break;
            case 'name_asc':
                $builder->orderBy('karedok_items.name', 'ASC');
                break;
            default:
                $builder->orderBy('karedok_items.is_featured', 'DESC')
                        ->orderBy('karedok_items.id', 'ASC');
                break;
        }

        return $builder->findAll();
    }
}
