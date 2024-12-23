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

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100">
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
                        <a href="/produk" class="sidebar-link  flex items-center p-4 hover:bg-blue-50">
                            <i data-lucide="file-text" class="w-5 h-5 mr-4"></i>
                            <span class="font-medium">Produk</span>
                        </a>
                        <a href="<?= base_url("pesanan") ?>"
                            class="sidebar-link active flex items-center p-4 ">
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
            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow-md p-6 col-span-3 w-full">
                <?php if (session()->get('success')): ?>
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-lg flex items-center">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-400 mr-3"></i>
                        <p class="text-green-700"><?= session()->get('success'); ?></p>
                    </div>
                    <?php session()->remove('success'); endif; ?>

                <?php if (session()->get('error')): ?>
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-lg flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-400 mr-3"></i>
                        <p class="text-red-700"><?= session()->get('error'); ?></p>
                    </div>
                    <?php session()->remove('error'); endif; ?>
                <div>
                    <button id="btnPendingTable" class="flex w-full  p-2 justify-between">
                        <h1 class="text-red-500 text-xl font-bold">Pending</h1>
                        <h1 class="text-red-500 text-xl font-bold">&darr;</h1>
                    </button>
                    <table id="pendingTable" class="w-full collapse table-auto mt-[20px]">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">nama produk</th>
                                <th class="text-center">harga</th>
                                <th class="text-center">status</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">upload bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-center py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-center py-2 px-2 ">Rp.<?=esc(number_format($product['total'], 0, ',', '.'))?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["kuantitas"] ?></td>
                                    <?php if($product["metode_pembayaran"] == "Transfer Bank"): ?>
                                        <td class="text-center py-2 px-2 "><a href="/pesanan/uploadBukti/<?= $product["id"] ?>" class="btn bg-yellow-300 hover:bg-yellow-500 py-1 px-2 rounded-full">Upload Bukti</a></td>
                                    <?php else: ?>    
                                        <td class="text-center py-2 px-2 "><?= $product["metode_pembayaran"] ?></td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>    
                <div>
                    <button id="btnCompletedTable"  class="flex w-full  p-2 justify-between">
                        <h1 class="text-green-500 text-xl font-bold">Completed</h1>
                        <h1 class="text-green-500 text-xl font-bold">&darr;</h1>
                    </button>
                    <table id="completedTable" class="w-full collapse table-auto mt-[20px]">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">nama produk</th>
                                <th class="text-center">harga</th>
                                <th class="text-center">status</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">bukti pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_completed as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-center py-2 px-2 "><?=$product["product_name"]?></td>
                                    <td class="text-center py-2 px-2 ">Rp.<?=esc(number_format($product['total'], 0, ',', '.'))?></td>
                                    <td class="text-center py-2 px-2 "><?=$product["status"] ?></td>
                                    <td class="text-center py-2 px-2 "><?=$product["kuantitas"] ?></td>
                                    <td class="text-center py-2 px-2 ">
                                        <img src="/img/buktiPembayaran/<?=$product["bukti_pembayaran"] ?>" 
                                        width="150" 
                                        class="mx-auto" 
                                        onclick="showModalBukti('<?= base_url('/img/BuktiPembayaran/' . $product['bukti_pembayaran']); ?>')"
                                        /></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button id="btnProcessedTable"  class="flex w-full  p-2 justify-between">
                        <h1 class="text-yellow-500 text-xl font-bold">Processed</h1>
                        <h1 class="text-yellow-500 text-xl font-bold">&darr;</h1>
                    </button>
                    <table id="processedTable" class="w-full collapse table-auto mt-[20px]">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">nama produk</th>
                                <th class="text-center">harga</th>
                                <th class="text-center">status</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">bukti pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_processeds as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-center py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-center py-2 px-2 ">Rp.<?=esc(number_format($product['total'], 0, ',', '.'))?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["kuantitas"] ?></td>
                                    <td class="text-center py-2 px-2 ">
                                        <img 
                                        src="/img/buktiPembayaran/<?= $product["bukti_pembayaran"] ?>" 
                                        width="150" 
                                        class="mx-auto"  
                                        alt=""
                                         onclick="showModalBukti('<?= base_url('/img/BuktiPembayaran/' . $product['bukti_pembayaran']); ?>')"
                                        />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button id="btnCancelledTable"  class="flex w-full  p-2 justify-between">
                        <h1 class="text-gray-500 text-xl font-bold">Cancelled</h1>
                        <h1 class="text-gray-500 text-xl font-bold">&darr;</h1>
                    </button>
                    <table id="cancelledTable" class="w-full collapse table-auto mt-[20px]">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">nama produk</th>
                                <th class="text-center">harga</th>
                                <th class="text-center">status</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">bukti pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_cancelleds as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-center py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-center py-2 px-2 ">Rp.<?=esc(number_format($product['total'], 0, ',', '.'))?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-center py-2 px-2 "><?= $product["kuantitas"] ?></td>
                                    <td class="text-center py-2 px-2 ">
                                        <img 
                                        src="/img/buktiPembayaran/<?= $product["bukti_pembayaran"] ?>" 
                                        width="150" 
                                        class="mx-auto" 
                                        onclick="showModalBukti('<?= base_url('/img/BuktiPembayaran/' . $product['bukti_pembayaran']); ?>')"
                                        /></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div id="imageModal" class="fixed inset-0  z-50 hidden bg-gray-800 bg-opacity-75 flex justify-center items-center">
                <div class="bg-white p-5 rounded shadow-lg max-w-xl relative ">
                    <button class="absolute top-2 right-2 text-gray-700" onclick="hideModalBukti()">&#10005;</button>
                    <img id="modalImage" src="" alt="Bukti Pembayaran" class="w-full rounded">
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

    const buttonPending = document.getElementById("btnPendingTable");
    buttonPending.addEventListener("click",showPendingTable);

    function showPendingTable(){
        const table = document.getElementById("pendingTable");
        const button = document.getElementById("btnPendingTable");
        table.classList.remove("collapse");
        button.removeEventListener("click",showPendingTable);
        button.addEventListener("click",hidePendingTable);
        
    }
    function hidePendingTable(){
        const table = document.getElementById("pendingTable");
        const button = document.getElementById("btnPendingTable");
        table.classList.add("collapse");
        button.removeEventListener("click",hidePendingTable);
        button.addEventListener("click",showPendingTable);
    }

    const button = document.getElementById("btnCompletedTable");
    button.addEventListener("click",showCompletedTable);
    
    function showCompletedTable(){
        const table = document.getElementById("completedTable");
        const button = document.getElementById("btnCompletedTable");
        table.classList.remove("collapse");
        button.removeEventListener("click",showCompletedTable);
        button.addEventListener("click",hideCompletedTable);
        
    }
    function hideCompletedTable(){
        const table = document.getElementById("completedTable");
        const button = document.getElementById("btnCompletedTable");
        table.classList.add("collapse");
        button.removeEventListener("click",hideCompletedTable);
        button.addEventListener("click",showCompletedTable);
    }
    const btnCancelledTable = document.getElementById("btnCancelledTable");
    btnCancelledTable.addEventListener("click",showCancelledTable);
    
    function showCancelledTable(){
        const table = document.getElementById("cancelledTable");
        const button = document.getElementById("btnCancelledTable");
        table.classList.remove("collapse");
        button.removeEventListener("click",showCancelledTable);
        button.addEventListener("click",hideCancelledTable);
        
    }
    function hideCancelledTable(){
        const table = document.getElementById("cancelledTable");
        const button = document.getElementById("btnCancelledTable");
        table.classList.add("collapse");
        button.removeEventListener("click",hideCancelledTable);
        button.addEventListener("click",showCancelledTable);
    }
    
    const buttonProcessed = document.getElementById("btnProcessedTable");
    buttonProcessed.addEventListener("click",showProcessedTable);

    function showProcessedTable(){
        const table = document.getElementById("processedTable");
        const button = document.getElementById("btnProcessedTable");
        table.classList.remove("collapse");
        button.removeEventListener("click",showProcessedTable);
        button.addEventListener("click",hideProcessedTable);
        
    }
    function hideProcessedTable(){
        const table = document.getElementById("processedTable");
        const button = document.getElementById("btnProcessedTable");
        table.classList.add("collapse");
        button.removeEventListener("click",hideProcessedTable);
        button.addEventListener("click",showProcessedTable);
    }

    function showModalBukti(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
        }

        function hideModalBukti() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }
    
    
    </script>
</body>

</html>