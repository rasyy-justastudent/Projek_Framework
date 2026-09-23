<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Banner Section -->
<section class="relative overflow-hidden pt-8 pb-16 md:pt-16 md:pb-24 bg-ivory">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Text -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 bg-amber-100/80 border border-amber-800/20 px-4 py-1.5 rounded-full text-xs font-black text-wood-800 tracking-wide uppercase shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-sunda-green animate-ping"></span>
                    <span>100% Sayuran Mentah Organik & Kencur Priangan</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-wood-900 leading-tight">
                    Cita Rasa Karedok Sunda <span class="text-sunda-green underline decoration-sunda-gold decoration-wavy decoration-2">Modern & Premium.</span>
                </h1>
                
                <p class="text-base sm:text-lg text-amber-900/80 font-medium leading-relaxed max-w-2xl">
                    Nikmati racikan Karedok otentik Jawa Barat berkualitas bintang lima. Kombinasi sayuran mentah krispi, ulekan kacang tanah sangrai, dan kencur aromatik yang menggetarkan lidah!
                </p>

                <!-- Hero Action Buttons & Badges -->
                <div class="pt-2 flex flex-wrap items-center gap-4">
                    <a href="#menu" class="wood-gradient text-white font-extrabold px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all text-base flex items-center gap-3">
                        <i class="fa-solid fa-utensils text-amber-300"></i> Pesan Menu Karedok
                    </a>
                    <a href="#racik" class="bg-sunda-green text-white font-bold px-7 py-4 rounded-2xl shadow-lg hover:bg-emerald-800 transition-all text-base flex items-center gap-2">
                        <i class="fa-solid fa-sliders text-emerald-200"></i> Racik Sendiri
                    </a>
                </div>

                <!-- Fast Food Stats Badges -->
                <div class="pt-6 grid grid-cols-3 gap-4 border-t border-wood-800/10">
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-wood-800 block">4.9/5</span>
                        <span class="text-xs font-semibold text-amber-800/70 uppercase tracking-wider">Ulasan Pelanggan</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-sunda-green block">15 Menit</span>
                        <span class="text-xs font-semibold text-amber-800/70 uppercase tracking-wider">Penyajian Fresh</span>
                    </div>
                    <div>
                        <span class="text-2xl sm:text-3xl font-black text-sunda-red block">Lv 1-5</span>
                        <span class="text-xs font-semibold text-amber-800/70 uppercase tracking-wider">Tingkat Pedas</span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Image Display -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Glow Backdrop -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-amber-600/20 to-sunda-green/20 rounded-3xl blur-2xl -z-10"></div>
                    
                    <div class="relative bg-white rounded-3xl p-3 shadow-2xl border-2 border-amber-800/10 transform rotate-1 hover:rotate-0 transition-transform duration-500">
                        <img src="<?= base_url('uploads/karedok/karedok_hero.jpg') ?>" alt="Karedok Authentic Sunda" class="w-full h-80 sm:h-96 object-cover rounded-2xl">
                        
                        <!-- Floating Badge -->
                        <div class="absolute top-6 right-6 wood-gradient text-amber-300 px-4 py-2 rounded-xl text-xs font-extrabold shadow-lg border border-amber-500/30 flex items-center gap-1.5">
                            <i class="fa-solid fa-crown text-amber-300"></i> CHEF RECOMMENDATION
                        </div>

                        <!-- Mini Price Overlay -->
                        <div class="absolute bottom-6 left-6 ivory-glass border border-wood-800/20 px-4 py-2.5 rounded-xl shadow-lg flex items-center gap-3">
                            <div>
                                <span class="text-[10px] font-bold text-amber-800 uppercase block">Harga Promo</span>
                                <span class="text-lg font-black text-sunda-green">Rp 28.000</span>
                            </div>
                            <button onclick="addToCart(1, 'Karedok Authentic Sunda Signature', 28000, 'karedok_hero.jpg')" class="bg-sunda-green text-white w-9 h-9 rounded-lg font-bold flex items-center justify-center hover:bg-emerald-800 shadow-md">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Menu Listing & Dynamic Sorting Section -->
<section id="menu" class="py-16 bg-wood-50/50 border-y border-wood-800/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Title -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-widest text-amber-700 block mb-1">DAFTAR MENU SPESIAL</span>
                <h2 class="text-3xl sm:text-4xl font-black text-wood-900">Jelajahi Menu Karedok Juara</h2>
            </div>
            <p class="text-sm text-amber-900/70 max-w-md">
                Gunakan filter kategori atau fitur pengurutan (Sorting) untuk menemukan racikan Karedok sesuai selera pedas dan anggaranku.
            </p>
        </div>

        <!-- Sorting & Search Control Bar -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-md border border-wood-800/10 mb-10 flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">
            
            <!-- Category Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none">
                <a href="<?= base_url('?category=all&sort=' . esc($currentSort)) ?>" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-extrabold whitespace-nowrap transition-all <?= ($activeCategory === 'all') ? 'wood-gradient text-white shadow-md' : 'bg-wood-100/80 text-wood-800 hover:bg-wood-200' ?>">
                    Semua Menu
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('?category=' . esc($cat['slug']) . '&sort=' . esc($currentSort)) ?>" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-extrabold whitespace-nowrap transition-all <?= ($activeCategory === $cat['slug']) ? 'wood-gradient text-white shadow-md' : 'bg-wood-100/80 text-wood-800 hover:bg-wood-200' ?>">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Sorting & Search Forms -->
            <div class="flex flex-wrap sm:flex-nowrap items-center gap-3">
                
                <!-- Sorting Dropdown Form -->
                <form method="GET" action="<?= base_url() ?>" class="flex items-center gap-2 flex-grow sm:flex-grow-0">
                    <input type="hidden" name="category" value="<?= esc($activeCategory) ?>">
                    <?php if (!empty($searchQuery)): ?>
                        <input type="hidden" name="q" value="<?= esc($searchQuery) ?>">
                    <?php endif; ?>

                    <label class="text-xs font-bold text-wood-800 whitespace-nowrap flex items-center gap-1">
                        <i class="fa-solid fa-arrow-down-wide-short text-sunda-gold"></i> Urutkan:
                    </label>
                    <select name="sort" onchange="this.form.submit()" class="px-3 py-2 rounded-xl border border-wood-800/20 bg-ivory text-xs font-bold text-wood-900 focus:ring-2 focus:ring-wood-800 focus:outline-none">
                        <option value="default" <?= ($currentSort === 'default') ? 'selected' : '' ?>>Rekomendasi Utama</option>
                        <option value="price_low" <?= ($currentSort === 'price_low') ? 'selected' : '' ?>>Harga: Terendah → Tertinggi</option>
                        <option value="price_high" <?= ($currentSort === 'price_high') ? 'selected' : '' ?>>Harga: Tertinggi → Terendah</option>
                        <option value="spice_high" <?= ($currentSort === 'spice_high') ? 'selected' : '' ?>>Tingkat Pedas: Terpedas 🌶️</option>
                        <option value="rating" <?= ($currentSort === 'rating') ? 'selected' : '' ?>>Rating Terfavorit ⭐</option>
                        <option value="name_asc" <?= ($currentSort === 'name_asc') ? 'selected' : '' ?>>Nama (A-Z)</option>
                    </select>
                </form>

                <!-- Search Input Form -->
                <form method="GET" action="<?= base_url() ?>" class="relative flex-grow sm:flex-grow-0 min-w-[200px]">
                    <input type="hidden" name="category" value="<?= esc($activeCategory) ?>">
                    <input type="hidden" name="sort" value="<?= esc($currentSort) ?>">
                    <input type="text" name="q" value="<?= esc($searchQuery ?? '') ?>" placeholder="Cari Karedok..." class="w-full pl-9 pr-4 py-2 rounded-xl border border-wood-800/20 bg-ivory text-xs font-bold focus:ring-2 focus:ring-wood-800 focus:outline-none">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-wood-800/40 text-xs"></i>
                </form>
            </div>

        </div>

        <!-- Menu Grid -->
        <?php if (empty($items)): ?>
            <div class="text-center py-16 bg-white rounded-3xl border border-wood-800/10">
                <i class="fa-solid fa-face-frown text-4xl text-wood-800/30 mb-3"></i>
                <h3 class="text-xl font-bold text-wood-800">Menu Tidak Ditemukan</h3>
                <p class="text-xs text-amber-800/60 mt-1">Coba gunakan kata kunci lain atau setel ulang filter sorting.</p>
                <a href="<?= base_url() ?>" class="inline-block mt-4 wood-gradient text-white px-5 py-2 rounded-xl text-xs font-bold">Reset Filter</a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($items as $item): ?>
                    <div class="bg-white rounded-3xl p-4 border border-wood-800/10 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                        
                        <div>
                            <!-- Image Container -->
                            <div class="relative overflow-hidden rounded-2xl mb-4 h-48 bg-wood-100">
                                <img src="<?= base_url('uploads/karedok/' . esc($item['image'])) ?>" alt="<?= esc($item['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <!-- Badge -->
                                <?php if (!empty($item['badge'])): ?>
                                    <span class="absolute top-3 left-3 bg-sunda-red text-white text-[10px] font-black px-2.5 py-1 rounded-lg uppercase tracking-wider shadow-md">
                                        <?= esc($item['badge']) ?>
                                    </span>
                                <?php endif; ?>

                                <!-- Spice Level Indicator Badge -->
                                <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-xs text-white px-2.5 py-1 rounded-lg text-xs font-extrabold flex items-center gap-1">
                                    <span>Pedas</span>
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fa-solid fa-pepper-hot <?= ($i <= $item['spice_level']) ? 'text-sunda-red' : 'text-gray-500 opacity-40' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <!-- Category & Rating -->
                            <div class="flex items-center justify-between text-xs mb-1">
                                <span class="font-bold text-amber-700 uppercase tracking-wider text-[10px]"><?= esc($item['category_name']) ?></span>
                                <span class="font-black text-sunda-gold flex items-center gap-1">
                                    <i class="fa-solid fa-star"></i> <?= esc($item['rating']) ?> (<?= esc($item['reviews_count']) ?>)
                                </span>
                            </div>

                            <!-- Title & Description -->
                            <h3 class="font-black text-base text-wood-900 mb-1 group-hover:text-sunda-green transition-colors line-clamp-1">
                                <?= esc($item['name']) ?>
                            </h3>
                            <p class="text-xs text-amber-900/70 line-clamp-2 leading-relaxed mb-4">
                                <?= esc($item['description']) ?>
                            </p>
                        </div>

                        <!-- Price & Action Buttons -->
                        <div class="pt-3 border-t border-wood-800/10 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-amber-800/60 uppercase block">Harga</span>
                                <span class="text-lg font-black text-sunda-green">Rp <?= number_format($item['price'], 0, ',', '.') ?></span>
                            </div>

                            <div class="flex items-center gap-2">
                                <button onclick="openDetailModal(<?= $item['id'] ?>)" class="bg-wood-100 hover:bg-wood-200 text-wood-800 p-2.5 rounded-xl transition-colors text-xs font-bold" title="Lihat Detail Halaman">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </button>
                                <button onclick="addToCart(<?= $item['id'] ?>, '<?= esc(addslashes($item['name'])) ?>', <?= $item['price'] ?>, '<?= esc($item['image']) ?>')" class="wood-gradient text-white px-4 py-2.5 rounded-xl font-extrabold text-xs shadow-md hover:shadow-lg transition-all flex items-center gap-1.5">
                                    <i class="fa-solid fa-cart-plus text-amber-300"></i> + Tambah
                                </button>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- Interactive Custom Order Builder Section ("Racik Karedok Sendiri") -->
<section id="racik" class="py-20 bg-ivory">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-wood-800 text-white rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden border-2 border-amber-600/30">
            <!-- Background Decorative Element -->
            <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-sunda-green/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
                
                <div class="lg:col-span-5 space-y-4">
                    <span class="bg-sunda-gold text-wood-900 text-xs font-black px-3 py-1 rounded-full uppercase tracking-widest inline-block">FITUR SPESIAL</span>
                    <h2 class="text-3xl sm:text-4xl font-black leading-tight text-white">Racik Karedok Custom Sesuai Seleramu!</h2>
                    <p class="text-amber-200 text-xs sm:text-sm leading-relaxed">
                        Pilih kombinasi sayuran mentah favoritmu, sesuaikan ketebalan bumbu kacang kencur, tentukan jumlah cabai rawit, dan tambahkan topping Sultan pilihanmu secara real-time.
                    </p>

                    <div class="space-y-2 pt-2 text-xs font-medium text-amber-100">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-sunda-gold"></i> Sayuran Mentah Dipetik Harian</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-sunda-gold"></i> Ulekan Kencur Sesuai Level Pedas</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-sunda-gold"></i> Bebas Pilih Topping Lontong / Tahu / Telur Asin</div>
                    </div>
                </div>

                <div class="lg:col-span-7 bg-ivory text-wood-900 rounded-2xl p-6 shadow-xl border border-amber-600/20">
                    <h3 class="font-extrabold text-lg text-wood-800 mb-4 pb-2 border-b border-wood-800/10 flex items-center justify-between">
                        <span><i class="fa-solid fa-mortar-pestle text-sunda-green mr-2"></i> Custom Karedok Craft Builder</span>
                        <span id="custom-price" class="text-sunda-red text-xl font-black">Rp 20.000</span>
                    </h3>

                    <form id="custom-karedok-form" onsubmit="addCustomToCart(event)" class="space-y-4 text-xs font-semibold">
                        
                        <!-- Step 1: Sayuran Choice -->
                        <div>
                            <label class="block text-wood-800 font-bold uppercase tracking-wider mb-2">1. Pilih Sayuran Mentah (Pilih minimal 2)</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Tauge Segar" checked onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Tauge Segar</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Kacang Panjang" checked onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Kacang Panjang</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Terong Hijau Bulat" checked onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Terong Hijau</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Kol Iris Krispi" checked onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Kol Iris</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Kemangi Surawung" checked onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Kemangi Surawung</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="veggie[]" value="Leunca Hijau (+3.000)" onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Leunca (+3rb)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Step 2: Spice Level Slider -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="text-wood-800 font-bold uppercase tracking-wider">2. Tingkat Pedas Cabai Rawit</label>
                                <span id="spice-level-text" class="font-extrabold text-sunda-red">Level 3 (Sedang - 5 Cabai)</span>
                            </div>
                            <input type="range" min="0" max="5" value="3" id="spice-range" oninput="updateSpiceSlider(this.value)" class="w-full accent-sunda-red cursor-pointer">
                        </div>

                        <!-- Step 3: Extra Toppings -->
                        <div>
                            <label class="block text-wood-800 font-bold uppercase tracking-wider mb-2">3. Tambah Topping Sultan</label>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="topping[]" value="Lontong Pandan (+5.000)" data-price="5000" onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Lontong (+5rb)</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="topping[]" value="Tahu & Tempe Goreng (+6.000)" data-price="6000" onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Tahu & Tempe (+6rb)</span>
                                </label>
                                <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-wood-800/10 cursor-pointer hover:border-sunda-green">
                                    <input type="checkbox" name="topping[]" value="Telur Asin Masir (+7.000)" data-price="7000" onchange="calcCustomPrice()" class="rounded text-sunda-green">
                                    <span>Telur Asin (+7rb)</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full wood-gradient text-white py-3 rounded-xl font-extrabold text-sm shadow-lg hover:shadow-xl transition-all">
                            <i class="fa-solid fa-plus-circle mr-1"></i> Masukkan Custom Karedok Ke Keranjang
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- Heritage Section ("Warisan Kuliner Sunda") -->
<section id="tentang" class="py-16 bg-wood-50/70 border-t border-wood-800/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-xs font-extrabold uppercase tracking-widest text-amber-700 block mb-2">FILOSOFI & TRADISI</span>
        <h2 class="text-3xl font-black text-wood-900 mb-4">Mengapa Karedok Jawa Barat Begitu Spesial?</h2>
        <p class="text-sm text-amber-900/80 max-w-2xl mx-auto leading-relaxed mb-12">
            Berbeda dengan Gado-Gado atau Lotek yang dimasak matang, **Karedok** disajikan 100% dari sayuran mentah segar yang kaya akan serat, enzim nutrisi murni, dan aroma segar kemangi surawung khas tanah Pasundan.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            <div class="bg-white p-6 rounded-3xl border border-wood-800/10 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-sunda-green flex items-center justify-center text-xl font-black">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h3 class="font-extrabold text-base text-wood-900">Sayuran Mentah Segar (Raw Veggies)</h3>
                <p class="text-xs text-amber-900/70 leading-relaxed">
                    Sayuran mentah dipetik segar setiap pagi langsung dari petani daerah Parahyangan untuk menjaga rasa krispi alami.
                </p>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-wood-800/10 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl font-black">
                    <i class="fa-solid fa-mortar-pestle"></i>
                </div>
                <h3 class="font-extrabold text-base text-wood-900">Sensasi Ulekan Kencur Aromatik</h3>
                <p class="text-xs text-amber-900/70 leading-relaxed">
                    Rahasia kelezatan Karedok ada pada kencur pilihan yang diulek bersama kacang tanah sangrai gurih dan gula aren asli Ciamis.
                </p>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-wood-800/10 shadow-sm space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-sunda-red flex items-center justify-center text-xl font-black">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <h3 class="font-extrabold text-base text-wood-900">Sehat, Organik & Bernutrisi High-Level</h3>
                <p class="text-xs text-amber-900/70 leading-relaxed">
                    Menciptakan tren baru makanan sehat siap saji (Healthy Fast Food) khas Indonesia yang tak kalah dengan salad barat.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Detail View Modal Container (Populated via AJAX) -->
<div id="detail-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div id="detail-modal-body" class="bg-ivory rounded-3xl max-w-xl w-full overflow-hidden shadow-2xl border border-wood-800/20 max-h-[90vh] flex flex-col">
        <!-- Loaded via JS -->
    </div>
</div>

<script>
    function updateSpiceSlider(val) {
        const labels = [
            'Level 0 (Tidak Pedas - 0 Cabai)',
            'Level 1 (Manis Gurih - 1 Cabai)',
            'Level 2 (Pedas Santai - 3 Cabai)',
            'Level 3 (Sedang - 5 Cabai)',
            'Level 4 (Pedas Nampol - 8 Cabai)',
            'Level 5 (Juara Pedas - 12 Cabai 🌶️)'
        ];
        document.getElementById('spice-level-text').innerText = labels[val];
    }

    function calcCustomPrice() {
        let base = 20000;
        const checkboxes = document.querySelectorAll('input[name="topping[]"]:checked');
        checkboxes.forEach(cb => {
            base += parseInt(cb.getAttribute('data-price') || 0);
        });

        const leuncaCb = document.querySelector('input[value="Leunca Hijau (+3.000)"]');
        if (leuncaCb && leuncaCb.checked) {
            base += 3000;
        }

        document.getElementById('custom-price').innerText = 'Rp ' + base.toLocaleString('id-ID');
        return base;
    }

    function addCustomToCart(e) {
        e.preventDefault();
        const price = calcCustomPrice();
        const veggies = Array.from(document.querySelectorAll('input[name="veggie[]"]:checked')).map(cb => cb.value);
        if (veggies.length < 2) {
            alert('Silakan pilih minimal 2 jenis sayuran mentah.');
            return;
        }
        const spice = document.getElementById('spice-range').value;
        const name = `Custom Karedok (Lv. ${spice} - ${veggies.length} Sayur)`;
        
        addToCart(9999, name, price, 'karedok_hero.jpg');
        alert('Custom Karedok racikan Anda berhasil masuk keranjang!');
    }

    function openDetailModal(id) {
        window.location.href = '<?= base_url('/karedok/detail/') ?>/' + id;
    }

    function closeDetailModal() {
        document.getElementById('detail-modal').classList.add('hidden');
    }
</script>

<?= $this->endSection() ?>
