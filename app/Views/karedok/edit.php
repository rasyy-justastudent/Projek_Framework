<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="py-12 bg-ivory min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-6 flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-amber-700 uppercase tracking-widest block">FORM EDIT MENU</span>
                <h1 class="text-3xl font-black text-wood-900">Edit Menu: <?= esc($item['name']) ?></h1>
            </div>
            <a href="<?= base_url('/admin') ?>" class="bg-wood-100 text-wood-800 px-4 py-2 rounded-xl text-xs font-bold hover:bg-wood-200">
                <i class="fa-solid fa-arrow-left mr-1"></i> Batal / Kembali
            </a>
        </div>

        <!-- Form Validation Errors Box -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="mb-6 p-4 rounded-2xl bg-red-100 border border-sunda-red text-sunda-red text-xs space-y-1">
                <div class="font-extrabold flex items-center gap-1.5 mb-1">
                    <i class="fa-solid fa-circle-xmark text-base"></i> Terdapat Kesalahan Input Validasi:
                </div>
                <ul class="list-disc list-inside font-medium pl-2">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-wood-800/10">
            <form action="<?= base_url('/admin/update/' . $item['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-5 text-xs font-semibold">
                <?= csrf_field() ?>

                <div>
                    <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Nama Menu Karedok *</label>
                    <input type="text" name="name" value="<?= old('name', $item['name']) ?>" required class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Kategori Menu *</label>
                        <select name="category_id" required class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= (old('category_id', $item['category_id']) == $cat['id']) ? 'selected' : '' ?>><?= esc($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Harga (Rp) *</label>
                        <input type="number" name="price" value="<?= old('price', $item['price']) ?>" required class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Tingkat Pedas (0 - 5) *</label>
                        <select name="spice_level" required class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                            <?php for ($s = 0; $s <= 5; $s++): ?>
                                <option value="<?= $s ?>" <?= (old('spice_level', $item['spice_level']) == $s) ? 'selected' : '' ?>>Level <?= $s ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Badge Promosi</label>
                        <input type="text" name="badge" value="<?= old('badge', $item['badge']) ?>" class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Deskripsi Ringkas *</label>
                    <textarea name="description" rows="3" required class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none"><?= old('description', $item['description']) ?></textarea>
                </div>

                <div>
                    <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Bahan & Komposisi</label>
                    <input type="text" name="ingredients" value="<?= old('ingredients', $item['ingredients']) ?>" class="w-full px-4 py-3 rounded-xl border border-wood-800/20 bg-ivory text-sm focus:ring-2 focus:ring-wood-800 focus:outline-none">
                </div>

                <div class="flex items-center gap-4">
                    <img src="<?= base_url('uploads/karedok/' . esc($item['image'])) ?>" class="w-16 h-16 object-cover rounded-xl border border-wood-800/10">
                    <div class="flex-grow">
                        <label class="block text-wood-800 font-bold uppercase tracking-wider mb-1">Ganti Foto Kuliner (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 rounded-xl border border-wood-800/20 bg-ivory text-xs">
                    </div>
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" <?= (old('is_featured', $item['is_featured']) == 1) ? 'checked' : '' ?> class="rounded text-sunda-green">
                        <span class="text-xs font-bold text-wood-900">Tampilkan Sebagai Menu Unggulan</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="available" <?= ($item['status'] === 'available') ? 'checked' : '' ?> class="text-sunda-green">
                        <span class="text-xs font-bold text-sunda-green">Tersedia</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="out_of_stock" <?= ($item['status'] === 'out_of_stock') ? 'checked' : '' ?> class="text-sunda-red">
                        <span class="text-xs font-bold text-sunda-red">Habis</span>
                    </label>
                </div>

                <button type="submit" class="w-full wood-gradient text-white py-3.5 rounded-2xl font-black text-sm shadow-lg hover:shadow-2xl transition-all">
                    <i class="fa-solid fa-sync mr-2"></i> Perbarui Menu Karedok
                </button>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
