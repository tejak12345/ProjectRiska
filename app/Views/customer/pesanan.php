<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - LeafletPro Farmasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-[#0F4C75] text-white p-4 shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="notifikasi-toggle" class="hover:text-blue-200 transition">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/40" alt="Profil" class="rounded-full w-10 h-10">
                    <div>
                        <p class="text-sm font-semibold">Dr. Widya Pratama</p>
                        <p class="text-xs text-blue-200">Farmasis</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pt-24">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                    <ul class="space-y-2">
                        <li>
                            <a href="<?= base_url('customer') ?>"
                                class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('produk') ?>"
                                class="flex items-center p-3 rounded-lg bg-blue-50 text-[#0F4C75] font-semibold">
                                <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("pesanan") ?>" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Pesanan Saya</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="message-circle" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Konsultasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("customer/profile") ?>" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="user" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow-md p-6 col-span-3 w-full">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">Product_id</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-end py-2 px-2 "><?= $product["product_id"] ?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["total"] ?></td>
                                    <td class="text-end py-2 px-2 "><span class="px-2 py-1 rounded-full text-white <?= $product["status"] == "Pending" ? "bg-red-500" : "bg-green-500"?>"><?= $product["status"] ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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