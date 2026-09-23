<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KaredokSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Categories
        $categories = [
            [
                'id'         => 1,
                'name'       => 'Karedok Signature',
                'slug'       => 'karedok-signature',
                'icon'       => 'utensils',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 2,
                'name'       => 'Special Combo Box',
                'slug'       => 'special-combo-box',
                'icon'       => 'box',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id'         => 3,
                'name'       => 'Minuman & Pencuci Mulut',
                'slug'       => 'minuman-pencuci-mulut',
                'icon'       => 'glass-martini-alt',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('categories')->insertBatch($categories);

        // 2. Seed Karedok Items
        $items = [
            [
                'category_id'   => 1,
                'name'          => 'Karedok Authentic Sunda Signature',
                'slug'          => 'karedok-authentic-sunda-signature',
                'description'   => 'Karedok khas Priangan dengan sayuran mentah segar (tauge, terong hijau bulat, kol, kemangi surawung, kacang panjang) disiram bumbu kacang gurih kencur melimpah.',
                'ingredients'   => 'Kacang tanah sangrai, Kencur harum, Cabai rawit merah, Gula merah aren, Terasi bakar, Tauge, Terong hijau, Kol iris, Daun Kemangi, Kacang Panjang, Kerupuk bawang.',
                'price'         => 28000.00,
                'spice_level'   => 3,
                'rating'        => 4.95,
                'reviews_count' => 142,
                'image'         => 'karedok_hero.jpg',
                'badge'         => 'CHEF RECOMMENDATION',
                'is_featured'   => 1,
                'status'        => 'available',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'   => 1,
                'name'          => 'Karedok Leunca Surawung Pedas Juara',
                'slug'          => 'karedok-leunca-surawung-pedas-juara',
                'description'   => 'Sensasi leunca segar yang meletus di mulut dipadu dengan aromatik daun surawung dan ulekan cabai kencur super pedas khas Bandung.',
                'ingredients'   => 'Leunca hijau segar, Daun surawung (kemangi), Cabai rawit domba, Bumbu kacang kencur, Garam gurih, Kerupuk putih.',
                'price'         => 25000.00,
                'spice_level'   => 5,
                'rating'        => 4.88,
                'reviews_count' => 98,
                'image'         => 'karedok_leunca.jpg',
                'badge'         => 'PEDAS JUARA',
                'is_featured'   => 1,
                'status'        => 'available',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'   => 2,
                'name'          => 'Karedok Special Sultan (Lontong + Tahu Tempe + Telur Asin)',
                'slug'          => 'karedok-special-sultan',
                'description'   => 'Paket lengkap Karedok istimewa disajikan dengan Lontong pandan lembut, Tahu Bandung goreng crispy, Tempe garit, dan Telur Asin Masir.',
                'ingredients'   => 'Karedok komplit, Lontong daun pisang, Tahu goreng, Tempe goreng, Telur Asin, Kerupuk udang, Bumbu kacang spesial.',
                'price'         => 38000.00,
                'spice_level'   => 2,
                'rating'        => 4.98,
                'reviews_count' => 215,
                'image'         => 'karedok_special.jpg',
                'badge'         => 'BESTSELLER',
                'is_featured'   => 1,
                'status'        => 'available',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'category_id'   => 3,
                'name'          => 'Es Cendol Elizabeth Sunda Premium',
                'slug'          => 'es-cendol-elizabeth-sunda-premium',
                'description'   => 'Minuman penutup legendaris khas Jawa Barat dengan cendol tepung beras pandan suji, santan murni gurih, gula aren cair, dan nangka matang manis.',
                'ingredients'   => 'Cendol pandan suji, Gula aren Asli Ciamis, Santan kelapa tua, Nangka potong, Es serut.',
                'price'         => 18000.00,
                'spice_level'   => 0,
                'rating'        => 4.90,
                'reviews_count' => 176,
                'image'         => 'es_cendol.jpg',
                'badge'         => 'FAVORIT SEGAR',
                'is_featured'   => 1,
                'status'        => 'available',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('karedok_items')->insertBatch($items);

        // 3. Seed Sample Reviews
        $reviews = [
            [
                'karedok_id'    => 1,
                'reviewer_name' => 'Asep Kurniawan',
                'rating'        => 5,
                'comment'       => 'Bumbu kacang kencurnya berasa banget, aromatik dan sayurannya super fresh kriyuk-kriyuk!',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'karedok_id'    => 2,
                'reviewer_name' => 'Neng Teh Dedeh',
                'rating'        => 5,
                'comment'       => 'Karedok Leunca paling raos se-Jawa Barat. Pedasnya nampol banget, bikin nambah nambah terus!',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'karedok_id'    => 3,
                'reviewer_name' => 'Randi Pratama',
                'rating'        => 5,
                'comment'       => 'Porsi Sultan kenyang maksimal! Telur asin sama lontongnya mantap jiwa dipadu karedok segar.',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('reviews')->insertBatch($reviews);
    }
}
