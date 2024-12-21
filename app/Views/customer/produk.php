<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeafletPro Farmasi - Modern Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f4f8;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .product-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(66, 153, 225, 0.1), rgba(49, 130, 206, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-image {
            height: 250px;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .product-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to top, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        }

        .price-tag {
            background: linear-gradient(135deg, #3182CE 0%, #2C5282 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.3);
        }

        .btn-modern {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-modern::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%) scale(0);
            border-radius: 50%;
            transition: transform 0.5s ease;
        }

        .btn-modern:hover::before {
            transform: translate(-50%, -50%) scale(2);
        }

        .btn-detail {
            background: linear-gradient(135deg, #4299E1 0%, #3182CE 100%);
            color: white;
        }

        .btn-buy {
            background: linear-gradient(135deg, #48BB78 0%, #38A169 100%);
            color: white;
        }

        .navbar {
            background: linear-gradient(135deg, #2C5282 0%, #2B6CB0 100%);
        }

        .sidebar {
            background: white;
            border-radius: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .sidebar-link {
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            background: linear-gradient(135deg, rgba(66, 153, 225, 0.1) 0%, rgba(49, 130, 206, 0.1) 100%);
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, #4299E1 0%, #3182CE 100%);
            color: white;
        }

        /* Modern Search Bar */
        .search-bar {
            background: white;
            border-radius: 20px;
            padding: 0.8rem 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.2);
        }

        /* Floating Labels */
        .floating-label {
            position: absolute;
            top: 0;
            left: 1rem;
            transform: translateY(-50%);
            background: white;
            padding: 0 0.5rem;
            color: #4A5568;
            font-size: 0.875rem;
        }

        /* Modern Modal */
        .modal-content {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .modal-backdrop {
            backdrop-filter: blur(8px);
            background: rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100">
    <!-- Modern Navbar -->
    <nav class="navbar fixed w-full z-50 px-6 py-4">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <i data-lucide="file-text" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <h1 class="text-2xl font-bold text-white">LeafletPro</h1>
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4 bg-white/10 rounded-2xl px-6 py-3">
                        <img src="https://via.placeholder.com/40" alt="Profile"
                            class="w-10 h-10 rounded-xl border-2 border-white/30">
                        <div>
                            <?php if (session()->get('username')): ?>
                                <p class="text-white font-semibold"><?= session()->get('username'); ?></p>
                                <p class="text-blue-200 text-sm">Farmasis</p>
                            <?php else: ?>
                                <p class="text-white font-semibold">Guest</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button class="lg:hidden text-white">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-28 px-6 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Modern Sidebar -->
            <div class="lg:col-span-1">
                <div class="sidebar p-6 sticky top-28">
                    <div class="space-y-3">
                        <a href="/dashboard" class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <a href="/produk" class="sidebar-link active flex items-center p-4">
                            <i data-lucide="file-text" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Produk</span>
                        </a>
                        <a href="<?= base_url("pesanan") ?>"
                            class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Pesanan</span>
                        </a>
                        <a href="<?= base_url('profile') ?>"
                            class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="user" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Profil</span>
                        </a>

                        <div class="pt-4 mt-4 border-t border-gray-100">
                            <a href="/customer/logout"
                                class="sidebar-link flex items-center p-4 text-red-500 hover:bg-red-50">
                                <i data-lucide="log-out" class="w-5 h-5 mr-4"></i>
                                <span class="font-medium">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="lg:col-span-3">
                <!-- Header with Search -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Our Products</h1>
                        <p class="text-gray-600">Discover our premium pharmaceutical products</p>
                    </div>
                    <div class="search-bar flex items-center w-full md:w-auto">
                        <i data-lucide="search" class="w-5 h-5 text-gray-400 mr-3"></i>
                        <input type="text" placeholder="Search products..."
                            class="bg-transparent border-none outline-none flex-1 text-gray-700">
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                                <img src="<?= base_url('/img/products/' . $product['image']) ?>"
                                    alt="<?= esc($product['name']) ?>" class="product-image w-full">
                            <?php else: ?>
                                <div class="product-image w-full bg-blue-50 flex items-center justify-center">
                                    <i data-lucide="image" class="w-16 h-16 text-blue-200"></i>
                                </div>
                            <?php endif; ?>

                            <div class="price-tag">
                                Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3"><?= esc($product['name']) ?></h3>
                                <p class="text-gray-600 mb-6 line-clamp-3"><?= esc($product['description']) ?></p>

                                <div class="flex space-x-4">
                                    <button
                                        onclick="openModal('<?= esc($product['name']) ?>', 'Rp <?= esc(number_format($product['price'], 0, ',', '.')) ?>', '<?= esc($product['description']) ?>')"
                                        class="btn-modern btn-detail flex-1">
                                        Detail
                                    </button>
                                    <a href="/produk/beli/<?= $product['id'] ?>"
                                        class="btn-modern btn-buy flex-1 text-center">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Modal -->
<div id="productModal" class="fixed inset-0 hidden z-50 bg-opacity-50 bg-black">
    <div class="modal-backdrop absolute inset-0 flex items-center justify-center p-6">
        <div class="modal-content w-full max-w-2xl p-8 relative bg-white rounded-lg shadow-xl transform transition-all duration-300 ease-in-out scale-95 opacity-0 hover:scale-100 hover:opacity-100">
            <button id="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <!-- Gambar Produk -->
            <img src="" alt="Product Image" class="w-full h-64 object-cover rounded-md mb-4" id="modalProductImage">

            <h2 class="text-3xl font-extrabold text-gray-800 mb-3 text-center" id="modalProductName"></h2>
            <p class="text-xl font-semibold text-blue-600 mb-6 text-center" id="modalProductPrice"></p>
            
            <!-- Rating Produk -->
            <div class="flex items-center mb-6">
                <span class="text-yellow-500">
                    ★★★★☆
                </span>
                <span class="text-sm text-gray-500 ml-2">(123 Reviews)</span>
            </div>

            <!-- Stok Tersedia -->
            <p class="text-sm text-gray-600 mb-6" id="modalProductAvailability">Stok Tersedia: 15 unit</p>

            <!-- Deskripsi Produk -->
            <p class="text-lg text-gray-700 leading-relaxed mb-6" id="modalProductDescription">Deskripsi produk singkat...</p>
            <button id="seeMoreDescriptionBtn" class="text-blue-500">Lihat Selengkapnya</button>

            <!-- Promo -->
            <div class="mt-4 bg-yellow-100 p-4 rounded-md">
                <p class="text-xl font-bold text-yellow-600">Diskon 20% untuk pembelian pertama!</p>
            </div>

          

            <div class="mt-8 flex justify-end">
                <button id="closeModalBtn" class="btn-modern bg-gradient-to-r from-blue-500 to-indigo-600 text-white hover:from-blue-600 hover:to-indigo-700 px-6 py-2 rounded-md shadow-md transform hover:scale-105 transition duration-200">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            const modal = document.getElementById('productModal');
            const closeButtons = document.querySelectorAll('#closeModal, #closeModalBtn');

            window.openModal = function (name, price, description) {
                modal.classList.remove('hidden');
                document.getElementById('modalProductName').textContent = name;
                document.getElementById('modalProductPrice').textContent = price;
                document.getElementById('modalProductDescription').textContent = description;
                document.body.style.overflow = 'hidden';
            
            // Tambahkan animasi fade in
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.style.opacity = '1';
            }, 10);
        };

        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Tambahkan animasi fade out
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }, 300);
            });
        });

        // Tutup modal saat mengklik di luar konten modal
        modal.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-backdrop')) {
                // Tambahkan animasi fade out
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        });

        // Tambahkan animasi hover pada card produk
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Tambahkan efek ripple pada tombol
        const buttons = document.querySelectorAll('.btn-modern');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                let ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                let x = e.clientX - e.target.offsetLeft;
                let y = e.clientY - e.target.offsetTop;
                
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                
                setTimeout(() => {
                    ripple.remove();
                }, 1000);
            });
        });

        // Tambahkan efek smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Tambahkan fitur pencarian real-time
        const searchInput = document.querySelector('input[type="text"]');
        const products = document.querySelectorAll('.product-card');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            products.forEach(product => {
                const productName = product.querySelector('h3').textContent.toLowerCase();
                const productDesc = product.querySelector('p').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productDesc.includes(searchTerm)) {
                    product.style.display = 'block';
                    // Tambahkan animasi fade in
                    product.style.opacity = '0';
                    setTimeout(() => {
                        product.style.opacity = '1';
                    }, 10);
                } else {
                    product.style.display = 'none';
                }
            });
        });

        // Tambahkan loading state pada tombol beli
        const buyButtons = document.querySelectorAll('.btn-buy');
        buyButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.innerHTML = '<i data-lucide="loader" class="w-5 h-5 animate-spin"></i>';
                // Reset text setelah 2 detik
                setTimeout(() => {
                    this.innerHTML = 'Beli';
                }, 2000);
            });
        });

        // Tambahkan notifikasi ketika produk ditambahkan ke keranjang
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.classList.add('fixed', 'bottom-4', 'right-4', 'bg-green-500', 'text-white', 
                                    'px-6', 'py-3', 'rounded-xl', 'shadow-lg', 'z-50');
            notification.textContent = message;
            document.body.appendChild(notification);

            // Hilangkan notifikasi setelah 3 detik
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Tambahkan efek skeleton loading
        function addSkeletonLoading() {
            const productsGrid = document.querySelector('.grid');
            const skeleton = `
                <div class="animate-pulse">
                    <div class="h-64 bg-gray-200 rounded-t-xl"></div>
                    <div class="p-6 space-y-4">
                        <div class="h-6 bg-gray-200 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-200 rounded"></div>
                        <div class="h-4 bg-gray-200 rounded w-5/6"></div>
                        <div class="flex space-x-4">
                            <div class="h-10 bg-gray-200 rounded flex-1"></div>
                            <div class="h-10 bg-gray-200 rounded flex-1"></div>
                        </div>
                    </div>
                </div>
            `;
            
            // Tambahkan 6 skeleton loading
            for (let i = 0; i < 6; i++) {
                productsGrid.innerHTML += skeleton;
            }
        }
    });
    </script>
</body>
</html>