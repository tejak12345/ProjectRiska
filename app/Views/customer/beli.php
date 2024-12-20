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
                            <a href="#" class="flex items-center p-3 rounded-lg hover:bg-blue-50 transition">
                                <i data-lucide="user" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-3 grid grid-cols-2">
                <div class="col-span-1 shadow-xl m-2 px-5 py-2 rounded-xl">
                    <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                        <img src="<?= base_url('/img/products/' . $product['image']) ?>"
                            alt="<?= esc($product['name']) ?>" class="w-full h-40 object-cover object-center">
                    <?php else: ?>
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    <?php endif; ?>
                    <h1 class="font-bold text-xl"><?= $product["name"] ?></h1>
                    <p class="text-gray-500 lg:h-[70px] truncate"><?= $product["description"] ?></p>
                    <p class="">Rp.<?= esc(number_format($product["price"],0,',','.'))?></p>
                </div>
                <form class="col-span-1" action="/prosescheckout/<?= esc($product["id"]) ?>" method="POST" >
                    <?= csrf_field(); ?>
                    <div class="">
                        <label for="username" class="w-full text-blue-800">Username</label>
                        <input type="text" class="w-full border-blue-800 border rounded-md py-2 px-3 mb-2" value="<?= $user["username"] ?> " name="username" required>
                        <label for="uesrname" class="w-full text-blue-800">Email</label>
                        <input type="email" class="w-full border-blue-800 border rounded-md py-2 px-3" value="<?= $user["email"] ?> " name="email" required>
                    </div>
                    <div class="">
                        <label for="metode_pembayaran" class="w-full block text-blue-800 mt-2">Metode Pembayaran</label>
                        <select name="metode_pembayaran" onchange={show_pilih_bank()} id="metode_pembayaran" class="w-full py-2 border border-blue-800 rounded-md hover:cursor-pointer">
                            <option value="Cash">Cash</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                        <label for="pilih_bank" id="pilih_bank_lbl" class="w-full text-blue-800 mt-2 hidden">Pilih Bank</label>
                        <select name="pilih_bank" id="pilih_bank" class="w-full py-2 border border-blue-800 rounded-md hover:cursor-pointer hidden">
                            <option value="BRI">BRI</option>
                            <option value="BCA">BCA</option>
                        </select>
                        <button type="submit" class="block py-2 px-3 border bg-green-500 hover:bg-green-800 rounded-md text-white mt-2">Pesan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk Detail Produk -->
    <?php if(session()->getFlashdata("success") || session()->getFlashdata("error")) :?>
        
        <div id="notifikasiModal" class="fixed inset-0 flex justify-center items-center bg-gray-700 bg-opacity-50">
            <div class="bg-white rounded-lg w-96 p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Notifikasi</h2>
                    <button id="closeModal" onclick={closeModal()} class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <?php if(session()->getFlashdata("success")):  ?>
                    <p class="text-green-500 font-semibold my-2" id="notifikasiStatus"><?= session()->getFlashdata("success") ?></p>
                    <div class="flex justify-end items-center">
                        <a id="okBtn" href="/produk/" class="mt-6 px-3 py-2 text-white btn bg-green-500 rounded-xl">Oke</a>
                    </div>
                    <?php elseif (session()->getFlashdata("error")):  ?>
                        <p class="text-red-500 font-semibold my-2" id="notifikasiStatus"><?= session()->getFlashdata("error") ?></p>
                        <div class="flex justify-end items-center">
                            <a id="okBtn" href="/produk/beli/<?= esc($product["id"]) ?>" class="mt-6 text-right text-white btn bg-red-500 rounded-xl">Oke</a>
                        </div>
                        <?php endif; ?>
                </div>
            </div>
    <?php endif; ?>

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