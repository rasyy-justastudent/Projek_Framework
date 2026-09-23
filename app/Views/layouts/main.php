<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'AL FARIDZI KAREDOK - Kuliner Khas Jawa Barat') ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ivory: '#FFFFF0',
                        wood: {
                            50: '#FDF8F3',
                            100: '#F9EFE3',
                            500: '#B45309',
                            800: '#78350F',
                            900: '#451A03',
                        },
                        sunda: {
                            green: '#15803D',
                            lightgreen: '#DCFCE7',
                            red: '#DC2626',
                            gold: '#D97706',
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FFFFF0;
            color: #451A03;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .wood-gradient {
            background: linear-gradient(135deg, #78350F 0%, #451A03 100%);
        }
        .ivory-glass {
            background: rgba(255, 255, 240, 0.85);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased selection:bg-wood-800 selection:text-white">

    <!-- Top Announcement Bar -->
    <div class="wood-gradient text-amber-100 text-xs md:text-sm py-2 px-4 text-center font-semibold tracking-wide flex justify-center items-center gap-2">
        <span class="bg-sunda-red text-white px-2 py-0.5 rounded-full text-[10px] uppercase font-bold tracking-widest animate-pulse">PROMO SPESIAL</span>
        <span>Gunakan Kode Promo <code class="bg-amber-950/60 text-amber-300 px-2 py-0.5 rounded font-mono border border-amber-700/50">KAREDOKJUARA</code> Potongan Rp 10.000!</span>
    </div>

    <!-- Main Navigation Header (Floating Capsule Burger Bangor Style) -->
    <header class="sticky top-3 z-40 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-2">
        <div class="wood-gradient text-white rounded-full px-6 sm:px-8 py-3.5 shadow-2xl border-2 border-amber-600/30 flex items-center justify-between backdrop-blur-md">
            <!-- Brand Logo (Pure Typography) -->
            <a href="<?= base_url() ?>" class="flex flex-col group py-0.5">
                <div class="flex items-center gap-2">
                    <span class="text-lg sm:text-2xl font-black tracking-tighter text-white group-hover:text-amber-300 transition-colors uppercase">
                        AL FARIDZI <span class="text-emerald-400 font-black">KAREDOK</span>
                    </span>
                    <span class="bg-sunda-red text-white text-[9px] font-black px-2 py-0.5 rounded-full uppercase tracking-wider shadow-xs transform -rotate-3 group-hover:rotate-0 transition-transform">
                        SUNDA
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-bold text-amber-100">
                <a href="<?= base_url('#menu') ?>" class="hover:text-amber-300 transition-colors">Daftar Menu</a>
                <a href="<?= base_url('#racik') ?>" class="hover:text-amber-300 transition-colors flex items-center gap-1.5 text-amber-300 bg-white/10 px-3.5 py-1.5 rounded-full border border-amber-400/30">
                    <i class="fa-solid fa-mortar-pestle"></i> Racik Karedok
                </a>
                <a href="<?= base_url('#tentang') ?>" class="hover:text-amber-300 transition-colors">Warisan Sunda</a>
                <a href="<?= base_url('/admin') ?>" class="hover:text-white transition-colors text-xs bg-amber-400/20 text-amber-300 px-3 py-1.5 rounded-full border border-amber-400/30">
                    <i class="fa-solid fa-sliders mr-1"></i> Admin Panel
                </a>
            </nav>

            <!-- Actions & Cart Drawer Trigger -->
            <div class="flex items-center">
                <button onclick="toggleCartDrawer()" class="bg-white text-wood-900 px-5 py-2 rounded-full font-black text-sm shadow-lg hover:bg-amber-300 hover:scale-105 transition-all inline-flex items-center gap-2">
                    <i class="fa-solid fa-basket-shopping text-sunda-green"></i>
                    <span>Keranjang</span>
                    <span id="cart-badge-count" class="bg-sunda-red text-white text-[11px] font-black w-5 h-5 rounded-full inline-flex items-center justify-center shrink-0">0</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Floating Shopping Cart Drawer -->
    <div id="cart-drawer-overlay" onclick="toggleCartDrawer()" class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>
    <aside id="cart-drawer" class="fixed right-0 top-0 bottom-0 w-full max-w-md bg-ivory z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-out flex flex-col justify-between border-l border-wood-800/10">
        <div class="p-6 wood-gradient text-ivory flex items-center justify-between shadow-md">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-amber-300 font-bold">
                    <i class="fa-solid fa-bag-shopping text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg leading-tight">Keranjang Belanja</h3>
                    <p class="text-xs text-amber-200">Karedok Segar Siap Diracik</p>
                </div>
            </div>
            <button onclick="toggleCartDrawer()" class="text-amber-200 hover:text-white w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <!-- Cart Items List -->
        <div id="cart-items-container" class="p-6 overflow-y-auto flex-grow space-y-4">
            <!-- Empty State -->
            <div id="cart-empty-state" class="text-center py-12">
                <div class="w-20 h-20 bg-wood-100 text-wood-800 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    <i class="fa-solid fa-bowl-food"></i>
                </div>
                <h4 class="font-bold text-lg text-wood-800">Keranjang Masih Kosong</h4>
                <p class="text-xs text-amber-900/60 mt-1 max-w-xs mx-auto">Pilih menu Karedok favoritmu atau racik sendiri karedok impianmu!</p>
            </div>
        </div>

        <!-- Cart Footer & Checkout -->
        <div class="p-6 bg-wood-50 border-t border-wood-800/10 space-y-4">
            <div class="space-y-2 text-sm text-wood-900 font-medium">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span id="cart-subtotal" class="font-bold">Rp 0</span>
                </div>
                <div class="flex justify-between text-sunda-green">
                    <span>Diskon Promo</span>
                    <span id="cart-discount" class="font-bold">- Rp 0</span>
                </div>
                <div class="flex justify-between text-base font-extrabold text-wood-800 pt-2 border-t border-wood-800/10">
                    <span>Total Pembayaran</span>
                    <span id="cart-total" class="text-xl text-sunda-red">Rp 0</span>
                </div>
            </div>

            <button onclick="openCheckoutModal()" id="btn-checkout" disabled class="w-full wood-gradient text-white font-black py-3.5 rounded-xl shadow-lg hover:shadow-2xl opacity-50 cursor-not-allowed transition-all flex items-center justify-center gap-2">
                <span>Lanjut Ke Pembayaran</span>
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </aside>

    <!-- Global Order Checkout Modal -->
    <div id="checkout-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-ivory rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl border border-wood-800/20 max-h-[90vh] flex flex-col">
            <div class="wood-gradient text-white p-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-black">Konfirmasi & Checkout Pesanan</h3>
                    <p class="text-xs text-amber-200">Isi data pengiriman untuk peracikan karedok segar Anda</p>
                </div>
                <button onclick="closeCheckoutModal()" class="text-amber-200 hover:text-white text-xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            
            <form id="form-checkout" onsubmit="handleCheckoutSubmit(event)" class="p-6 overflow-y-auto space-y-4">
                <input type="hidden" name="order_items" id="checkout-order-items-input">
                <input type="hidden" name="total_amount" id="checkout-total-amount-input">

                <div>
                    <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Nama Pemesan *</label>
                    <input type="text" name="customer_name" required placeholder="Contoh: Kang Cecep / Neng Lilis" class="w-full px-4 py-2.5 rounded-xl border border-wood-800/20 bg-white focus:outline-none focus:ring-2 focus:ring-wood-800 text-sm font-medium">
                </div>

                <div>
                    <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Nomor WhatsApp / HP *</label>
                    <input type="tel" name="customer_phone" required placeholder="081234567890" class="w-full px-4 py-2.5 rounded-xl border border-wood-800/20 bg-white focus:outline-none focus:ring-2 focus:ring-wood-800 text-sm font-medium">
                </div>

                <div>
                    <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Alamat Pengiriman Lengkap *</label>
                    <textarea name="customer_address" required rows="2" placeholder="Jl. Sunda No. 45, Bandung, Jawa Barat" class="w-full px-4 py-2.5 rounded-xl border border-wood-800/20 bg-white focus:outline-none focus:ring-2 focus:ring-wood-800 text-sm font-medium"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Metode Pembayaran</label>
                        <select name="payment_method" class="w-full px-3 py-2.5 rounded-xl border border-wood-800/20 bg-white focus:outline-none focus:ring-2 focus:ring-wood-800 text-sm font-semibold">
                            <option value="QRIS">QRIS All Payment</option>
                            <option value="COD">Bayar Di Tempat (COD)</option>
                            <option value="Transfer Bank">Transfer Bank (BCA/Mandiri)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Kode Promo</label>
                        <div class="flex gap-1">
                            <input type="text" id="promo-input" name="promo_code" placeholder="KAREDOKJUARA" class="w-full px-3 py-2 rounded-xl border border-wood-800/20 bg-white text-sm uppercase font-mono">
                            <button type="button" onclick="applyPromoCode()" class="bg-wood-800 text-white px-3 py-2 rounded-xl text-xs font-bold hover:bg-wood-900">Gunakan</button>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-wood-800 uppercase tracking-wider mb-1">Catatan Khusus Peracikan (Opsional)</label>
                    <input type="text" name="notes" placeholder="Contoh: Bumbu kacang dipisah / Tanpa terasi" class="w-full px-4 py-2 rounded-xl border border-wood-800/20 bg-white text-xs">
                </div>

                <div class="bg-amber-100/50 p-4 rounded-2xl border border-amber-700/20 text-xs text-wood-900 space-y-1">
                    <div class="flex justify-between">
                        <span>Ringkasan Item</span>
                        <span id="checkout-summary-items-count" class="font-bold">0 Item</span>
                    </div>
                    <div class="flex justify-between text-base font-extrabold text-sunda-red pt-1 border-t border-amber-700/20">
                        <span>Total yang Harus Dibayar</span>
                        <span id="checkout-summary-final-total">Rp 0</span>
                    </div>
                </div>

                <button type="submit" class="w-full wood-gradient text-white py-3.5 rounded-xl font-extrabold text-base shadow-lg hover:shadow-2xl transition-all">
                    <i class="fa-solid fa-check-circle mr-2"></i> Buat Pesanan Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="wood-gradient text-amber-100 pt-16 pb-8 border-t border-amber-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="space-y-4">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-black tracking-tighter text-white uppercase">
                            AL FARIDZI <span class="text-emerald-400">KAREDOK</span>
                        </span>
                        <span class="bg-emerald-500 text-wood-950 text-[9px] font-black px-2 py-0.5 rounded uppercase tracking-wider">
                            SUNDA
                        </span>
                    </div>
                    <span class="text-[10px] font-extrabold text-amber-300 uppercase tracking-[0.2em] mt-0.5">
                        Kuliner Khas Jawa Barat
                    </span>
                </div>
                <p class="text-xs text-amber-200/80 leading-relaxed">
                    Website Resmi Promosi Makanan Khas Jawa Barat. Mengangkat cita rasa otentik Karedok Sunda dengan bahan raw veggie segar, kencur aromatik, dan saus kacang sangrai berstandar dunia.
                </p>
                <div class="flex items-center gap-3 text-amber-300 text-lg">
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider mb-4 border-b border-amber-700/50 pb-2">Menu Favorit</h4>
                <ul class="space-y-2 text-xs text-amber-200/80">
                    <li><a href="<?= base_url('#menu') ?>" class="hover:text-white">Karedok Signature Sunda</a></li>
                    <li><a href="<?= base_url('#menu') ?>" class="hover:text-white">Karedok Leunca Surawung</a></li>
                    <li><a href="<?= base_url('#menu') ?>" class="hover:text-white">Karedok Special Sultan</a></li>
                    <li><a href="<?= base_url('#menu') ?>" class="hover:text-white">Es Cendol Elizabeth</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider mb-4 border-b border-amber-700/50 pb-2">Nilai Budaya Sunda</h4>
                <ul class="space-y-2 text-xs text-amber-200/80">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-leaf text-emerald-400"></i> 100% Sayuran Mentah Organik</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-pepper-hot text-sunda-red"></i> Kencur & Cabai Asli Priangan</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-award text-amber-400"></i> Standar Kebersihan Higienis Fast Food</li>
                </ul>
            </div>

            <div>
                <h4 class="font-extrabold text-white text-sm uppercase tracking-wider mb-4 border-b border-amber-700/50 pb-2">Lokasi & Operasional</h4>
                <p class="text-xs text-amber-200/80 leading-relaxed mb-2">
                    <i class="fa-solid fa-location-dot text-amber-400 mr-1.5"></i> Jl. Asia Afrika No. 108, Kota Bandung, Jawa Barat
                </p>
                <p class="text-xs text-amber-200/80">
                    <i class="fa-solid fa-clock text-amber-400 mr-1.5"></i> Buka Setiap Hari: 09.00 - 21.00 WIB
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-6 border-t border-amber-900/60 flex flex-col md:flex-row justify-between items-center text-xs text-amber-300/60">
            <p>© 2026 AL FARIDZI KAREDOK - Website Modern Promosi Makanan Khas Daerah Indonesia (Jawa Barat). All rights reserved.</p>
            <p class="mt-2 md:mt-0 font-medium">Dibuat dengan CodeIgniter 4 + Tailwind CSS + MySQL</p>
        </div>
    </footer>

    <!-- Global Cart & Interactive JavaScript State -->
    <script>
        let cart = [];
        let appliedDiscount = 0;

        function toggleCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const overlay = document.getElementById('cart-drawer-overlay');
            drawer.classList.toggle('translate-x-full');
            overlay.classList.toggle('opacity-0');
            overlay.classList.toggle('pointer-events-none');
        }

        function addToCart(id, name, price, image) {
            const existing = cart.find(item => item.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push({ id, name, price: parseFloat(price), image, qty: 1 });
            }
            renderCart();
            toggleCartDrawer();
        }

        function updateCartQty(id, delta) {
            const index = cart.findIndex(item => item.id === id);
            if (index !== -1) {
                cart[index].qty += delta;
                if (cart[index].qty <= 0) {
                    cart.splice(index, 1);
                }
            }
            renderCart();
        }

        function renderCart() {
            const container = document.getElementById('cart-items-container');
            const emptyState = document.getElementById('cart-empty-state');
            const badge = document.getElementById('cart-badge-count');
            const btnCheckout = document.getElementById('btn-checkout');

            let totalQty = 0;
            let subtotal = 0;

            if (cart.length === 0) {
                container.innerHTML = `
                <div id="cart-empty-state" class="text-center py-12">
                    <div class="w-20 h-20 bg-wood-100 text-wood-800 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>
                    <h4 class="font-bold text-lg text-wood-800">Keranjang Masih Kosong</h4>
                    <p class="text-xs text-amber-900/60 mt-1 max-w-xs mx-auto">Pilih menu Karedok favoritmu atau racik sendiri karedok impianmu!</p>
                </div>`;
                btnCheckout.disabled = true;
                btnCheckout.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                let html = '';
                cart.forEach(item => {
                    const itemTotal = item.price * item.qty;
                    subtotal += itemTotal;
                    totalQty += item.qty;

                    html += `
                    <div class="flex items-center justify-between gap-3 p-3 rounded-2xl bg-white border border-wood-800/10 shadow-xs">
                        <img src="<?= base_url('uploads/karedok/') ?>/${item.image}" class="w-14 h-14 object-cover rounded-xl border border-wood-800/10">
                        <div class="flex-grow">
                            <h5 class="font-bold text-sm text-wood-900 line-clamp-1">${item.name}</h5>
                            <span class="text-xs font-bold text-sunda-green">Rp ${item.price.toLocaleString('id-ID')}</span>
                        </div>
                        <div class="flex items-center gap-2 bg-wood-50 px-2 py-1 rounded-xl border border-wood-800/10">
                            <button onclick="updateCartQty(${item.id}, -1)" class="w-6 h-6 rounded-lg bg-white text-wood-800 font-bold flex items-center justify-center shadow-xs text-xs">-</button>
                            <span class="text-xs font-black text-wood-900 w-4 text-center">${item.qty}</span>
                            <button onclick="updateCartQty(${item.id}, 1)" class="w-6 h-6 rounded-lg bg-white text-wood-800 font-bold flex items-center justify-center shadow-xs text-xs">+</button>
                        </div>
                    </div>`;
                });
                container.innerHTML = html;
                btnCheckout.disabled = false;
                btnCheckout.classList.remove('opacity-50', 'cursor-not-allowed');
            }

            badge.innerText = totalQty;
            document.getElementById('cart-subtotal').innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById('cart-discount').innerText = '- Rp ' + appliedDiscount.toLocaleString('id-ID');
            
            const grandTotal = Math.max(0, subtotal - appliedDiscount);
            document.getElementById('cart-total').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }

        function openCheckoutModal() {
            if (cart.length === 0) return;
            toggleCartDrawer();
            
            let subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            let grandTotal = Math.max(0, subtotal - appliedDiscount);

            document.getElementById('checkout-order-items-input').value = JSON.stringify(cart);
            document.getElementById('checkout-total-amount-input').value = grandTotal;
            document.getElementById('checkout-summary-items-count').innerText = cart.length + ' Jenis Item';
            document.getElementById('checkout-summary-final-total').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');

            document.getElementById('checkout-modal').classList.remove('hidden');
        }

        function closeCheckoutModal() {
            document.getElementById('checkout-modal').classList.add('hidden');
        }

        function applyPromoCode() {
            const promo = document.getElementById('promo-input').value.trim().toUpperCase();
            if (promo === 'KAREDOKJUARA') {
                appliedDiscount = 10000;
                alert('Selamat! Kode promo KAREDOKJUARA berhasil digunakan (Diskon Rp 10.000).');
            } else if (promo === 'SUNDA50') {
                appliedDiscount = 5000;
                alert('Selamat! Kode promo SUNDA50 berhasil digunakan (Diskon Rp 5.000).');
            } else {
                alert('Kode promo tidak valid atau telah kedaluwarsa.');
                appliedDiscount = 0;
            }
            renderCart();
            openCheckoutModal();
        }

        function handleCheckoutSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);

            fetch('<?= base_url('/checkout') ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.status) {
                    alert('🎉 PESANAN BERHASIL!\nKode Pesanan: ' + data.order_code + '\n' + data.message);
                    cart = [];
                    appliedDiscount = 0;
                    renderCart();
                    closeCheckoutModal();
                } else {
                    let errMsg = 'Gagal memproses pesanan:\n';
                    if (data.errors) {
                        for (let err in data.errors) {
                            errMsg += '- ' + data.errors[err] + '\n';
                        }
                    }
                    alert(errMsg);
                }
            })
            .catch(err => {
                alert('Terjadi kesalahan koneksi.');
            });
        }
    </script>
</body>
</html>
