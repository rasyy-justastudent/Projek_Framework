<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="py-12 bg-ivory min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
            <div>
                <span class="text-xs font-bold text-amber-700 uppercase tracking-widest block">PANEL PENGELOLAAN</span>
                <h1 class="text-3xl font-black text-wood-900">Kelola Menu Karedok</h1>
            </div>
            <a href="<?= base_url('/admin/create') ?>" class="wood-gradient text-white px-6 py-3 rounded-2xl font-extrabold text-sm shadow-lg hover:shadow-xl transition-all flex items-center gap-2">
                <i class="fa-solid fa-plus-circle text-amber-300"></i> Tambah Menu Baru
            </a>
        </div>

        <!-- Alert Notifications -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-6 p-4 rounded-2xl bg-sunda-lightgreen border border-sunda-green text-sunda-green font-bold text-xs flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-base"></i>
                <span><?= session()->getFlashdata('success') ?></span>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-6 p-4 rounded-2xl bg-red-100 border border-sunda-red text-sunda-red font-bold text-xs flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-base"></i>
                <span><?= session()->getFlashdata('error') ?></span>
            </div>
        <?php endif; ?>

        <!-- Table Controls (Search & Sort) -->
        <div class="bg-white p-4 rounded-2xl border border-wood-800/10 shadow-xs mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <form method="GET" action="<?= base_url('/admin') ?>" class="flex items-center gap-2 w-full sm:w-auto">
                <input type="text" name="q" value="<?= esc($searchQuery ?? '') ?>" placeholder="Cari nama menu..." class="px-4 py-2 rounded-xl border border-wood-800/20 bg-ivory text-xs font-bold w-full sm:w-64 focus:ring-2 focus:ring-wood-800 focus:outline-none">
                <button type="submit" class="bg-wood-800 text-white px-4 py-2 rounded-xl text-xs font-bold">Cari</button>
            </form>

            <form method="GET" action="<?= base_url('/admin') ?>" class="flex items-center gap-2">
                <label class="text-xs font-bold text-wood-800">Urutkan:</label>
                <select name="sort" onchange="this.form.submit()" class="px-3 py-2 rounded-xl border border-wood-800/20 bg-ivory text-xs font-bold text-wood-900 focus:outline-none">
                    <option value="default" <?= ($currentSort === 'default') ? 'selected' : '' ?>>Default</option>
                    <option value="price_low" <?= ($currentSort === 'price_low') ? 'selected' : '' ?>>Harga Rendah → Tinggi</option>
                    <option value="price_high" <?= ($currentSort === 'price_high') ? 'selected' : '' ?>>Harga Tinggi → Rendah</option>
                    <option value="spice_high" <?= ($currentSort === 'spice_high') ? 'selected' : '' ?>>Terpedas 🌶️</option>
                    <option value="rating" <?= ($currentSort === 'rating') ? 'selected' : '' ?>>Rating ⭐</option>
                </select>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-wood-800/10 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="wood-gradient text-white uppercase font-extrabold tracking-wider">
                        <tr>
                            <th class="py-4 px-6">Gambar & Nama Menu</th>
                            <th class="py-4 px-6">Kategori</th>
                            <th class="py-4 px-6">Harga</th>
                            <th class="py-4 px-6">Pedas</th>
                            <th class="py-4 px-6">Rating</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-center">Aksi CRUD</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-wood-800/10 font-semibold text-wood-900">
                        <?php foreach ($items as $item): ?>
                            <tr class="hover:bg-wood-50/80 transition-colors">
                                <td class="py-4 px-6 flex items-center gap-3">
                                    <img src="<?= base_url('uploads/karedok/' . esc($item['image'])) ?>" class="w-12 h-12 object-cover rounded-xl border border-wood-800/10">
                                    <div>
                                        <span class="font-extrabold text-sm block"><?= esc($item['name']) ?></span>
                                        <span class="text-[10px] text-amber-800/60 block font-mono"><?= esc($item['slug']) ?></span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-amber-800 font-bold"><?= esc($item['category_name']) ?></td>
                                <td class="py-4 px-6 font-black text-sunda-green">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                                <td class="py-4 px-6">
                                    <span class="bg-amber-100 text-sunda-red font-bold px-2 py-0.5 rounded-md">Lv <?= esc($item['spice_level']) ?> 🌶️</span>
                                </td>
                                <td class="py-4 px-6 font-bold text-sunda-gold">⭐ <?= esc($item['rating']) ?></td>
                                <td class="py-4 px-6">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-wider <?= ($item['status'] === 'available') ? 'bg-sunda-lightgreen text-sunda-green' : 'bg-red-100 text-sunda-red' ?>">
                                        <?= esc($item['status']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('/admin/edit/' . $item['id']) ?>" class="bg-amber-100 text-wood-800 px-3 py-1.5 rounded-lg hover:bg-amber-200 transition-colors font-bold flex items-center gap-1">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="<?= base_url('/admin/delete/' . $item['id']) ?>" onclick="return confirm('Yakin menghapus menu ini?')" class="bg-red-100 text-sunda-red px-3 py-1.5 rounded-lg hover:bg-red-200 transition-colors font-bold flex items-center gap-1">
                                            <i class="fa-solid fa-trash-can"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
