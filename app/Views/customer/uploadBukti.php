<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - LeafletPro Farmasi</title>
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

<body class="bg-gray-50">
    <!-- Modern Navbar -->
    <nav class="navbar fixed w-full z-50 px-6 py-4 top-0 left-0">
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
                              <p class="text-blue-200 text-sm capitalize"><?= session()->get("role"); ?></p>
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
    <div class="container mx-auto px-4 pt-28">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Modern Sidebar -->
            <div class="lg:col-span-1">
                <div class="sidebar p-6 sticky top-28">
                    <div class="space-y-3">
                        <a href="/dashboard" class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <a href="/produk" class="sidebar-link flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="file-text" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Produk</span>
                        </a>
                        <a href="<?= base_url("pesanan") ?>"
                            class="sidebar-link flex active items-center p-4 ">
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
            <div class="col-span-3">
                <div class="w-full">
                    <div class="bg-white p-10 rounded-lg shadow-md w-full ">
                        <h1 class="text-2xl font-bold mb-4 text-[#0F4C75]">Unggah Bukti Pembayaran</h1>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="col">
                                <h2 class="text-xl font-semibold ">Detail Produk</h2>
                                <div class="">
                                    <div>
                                        <img src="/img/products/<?= $produk["product_img"] ?>" alt="Foto Produk" class="w-full md:max-h-[200px] object-cover object-center rounded-xl">
                                        <h1 class="font-bold text-2xl"> <?= $produk['product_name'] ?></>
                                        <h3 class="font-semibold">Rp <?= number_format($produk['total_price'], 0, ',', '.') ?></h3>
                                        <p class="text-md max-h-[50px] overflow-y-auto">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum quidem voluptas quisquam illo porro vitae quam delectus unde aspernatur quibusdam.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <form class="col"  action="/uploadBukti/<?= $produk["id"] ?>" enctype="multipart/form-data" method="POST">
                                <div>
                                    <h2 class="text-xl font-semibold">Informasi Rekening</h2>
                                    <p>Silakan transfer ke rekening berikut:</p>
                                    <p><strong>Bank:</strong> BCA</p>
                                    <p><strong>No. Rekening:</strong> 1234567890</p>
                                    <p><strong>a.n.:</strong> Toko Online Anda</p>
                                </div>
                                <div class="my-5">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="bukti_pembayaran">
                                        Unggah Bukti Pembayaran
                                    </label>
                                    <input type="file" accept="image/png, image/jpeg" id="bukti_pembayaran" name="bukti_pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>
                                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 transition-all duration-75 text-white font-bold py-2 px-4 rounded">
                                    Kirim
                                </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        // Quantity Input Handler
        const quantityInput = document.querySelector('input[type="number"]');
        const decrementBtn = quantityInput.previousElementSibling;
        const incrementBtn = quantityInput.nextElementSibling;

        decrementBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        incrementBtn.addEventListener('click', () => {
            const currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    });

    
    function show_pilih_bank(){
        const metode_pembayaran = document.getElementById("metode_pembayaran");
        const pilih_bank = document.getElementById("pilih_bank");
        const pilih_bank_lbl = document.getElementById("pilih_bank_lbl");

        if(metode_pembayaran.value == "Transfer Bank"){
            pilih_bank.classList.remove("hidden");
            pilih_bank_lbl.classList.remove("hidden");
            pilih_bank_lbl.classList.add("block");
        }else{
            pilih_bank.classList.add("hidden");
            pilih_bank_lbl.classList.remove("block");
            pilih_bank_lbl.classList.add("hidden");
        }
    }

    function closeModal(){
        const modal = document.getElementById("notifikasiModal");
        modal.classList.remove("flex");
        modal.classList.add("hidden");
    }
    
    </script>
</body>

</html>

