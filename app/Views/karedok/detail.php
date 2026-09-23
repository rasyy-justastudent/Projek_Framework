<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="py-12 bg-ivory min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6">
            <a href="<?= base_url('/#menu') ?>" class="inline-flex items-center gap-2 bg-wood-100 text-wood-800 px-4 py-2 rounded-xl text-xs font-bold hover:bg-wood-200 transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Menu
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-wood-800/10 overflow-hidden grid grid-cols-1 md:grid-cols-12 gap-0">
            <!-- Left Image -->
            <div class="md:col-span-5 relative bg-wood-100 min-h-[300px]">
                <img src="<?= base_url('uploads/karedok/' . esc($item['image'])) ?>" alt="<?= esc($item['name']) ?>" class="w-full h-full object-cover">
                <?php if (!empty($item['badge'])): ?>
                    <span class="absolute top-4 left-4 bg-sunda-red text-white text-xs font-black px-3 py-1 rounded-lg uppercase shadow-md">
                        <?= esc($item['badge']) ?>
                    </span>
                <?php endif; ?>
            </div>

            <!-- Right Content -->
            <div class="md:col-span-7 p-6 sm:p-8 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div>
                        <span class="text-xs font-extrabold text-amber-700 uppercase tracking-widest block mb-1"><?= esc($item['category_name']) ?></span>
                        <h1 class="text-3xl font-black text-wood-900"><?= esc($item['name']) ?></h1>
                        <div class="flex items-center gap-3 text-xs font-bold text-sunda-green mt-1">
                            <span class="text-2xl font-black text-sunda-red">Rp <?= number_format($item['price'], 0, ',', '.') ?></span>
                            <span>• ⭐ <?= esc($item['rating']) ?> (<?= esc($item['reviews_count']) ?> Ulasan)</span>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-xs font-extrabold text-wood-800 uppercase tracking-wider mb-1">Deskripsi Menu</h4>
                        <p class="text-xs text-amber-900/80 leading-relaxed"><?= esc($item['description']) ?></p>
                    </div>

                    <div>
                        <h4 class="text-xs font-extrabold text-wood-800 uppercase tracking-wider mb-1">Bahan & Komposisi</h4>
                        <p class="text-xs text-amber-900/80 bg-wood-50 p-3 rounded-2xl border border-wood-800/10 leading-relaxed">
                            <?= esc($item['ingredients'] ?: 'Sayuran mentah pilihan & bumbu ulekan kencur asli Priangan.') ?>
                        </p>
                    </div>

                    <div>
                        <h4 class="text-xs font-extrabold text-wood-800 uppercase tracking-wider mb-1">Tingkat Pedas</h4>
                        <div class="flex items-center gap-1.5 text-sm font-bold text-wood-900">
                            <span>Level <?= esc($item['spice_level']) ?></span>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="fa-solid fa-pepper-hot <?= ($i <= $item['spice_level']) ? 'text-sunda-red' : 'text-gray-300' ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <button onclick="addToCart(<?= $item['id'] ?>, '<?= esc(addslashes($item['name'])) ?>', <?= $item['price'] ?>, '<?= esc($item['image']) ?>')" class="w-full wood-gradient text-white py-3.5 rounded-2xl font-black text-sm shadow-lg hover:shadow-2xl transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-cart-plus text-amber-300 text-base"></i> Tambahkan Ke Keranjang Belanja
                </button>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
