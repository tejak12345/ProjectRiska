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
                                class="flex items-center p-3 rounded-lg hover:bg-blue-50">
                                <i data-lucide="file-text" class="w-5 h-5 mr-3 text-gray-600"></i>
                                <span>Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url("pesanan") ?>" class="flex items-center p-3 rounded-lg bg-blue-50 text-[#0F4C75]  font-semibold hover:bg-blue-50 transition">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3 "></i>
                                <span>Pesanan Saya</span>
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
                <div>
                    <button id="btnPendingTable" class="flex w-full  p-2 justify-between">
                        <h1 class="text-red-500 text-xl font-bold">Pending</h1>
                        <h1 class="text-red-500 text-xl font-bold">&darr;</h1>
                    </button>
                    <table id="pendingTable" class="w-full collapse table-auto mt-[20px]">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="text-center">Product_name</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Upload Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-end py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-end py-2 px-2 ">Rp.<?=esc(number_format($product['total_price'], 0, ',', '.'))?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["quantity"] ?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-end py-2 px-2 "><button type="button" onclick="uploadBukti(<?= $product['product_id'] ?>,'<?= $product['product_name'] ?>',<?= $product['total_price'] ?>)" class="btn bg-yellow-300 hover:bg-yellow-500 py-1 px-2 rounded-full">Upload Bukti</button></td>
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
                                <th class="text-center">Product_name</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Bukti_pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_completed as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-end py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-end py-2 px-2 ">Rp.<?=esc(number_format($product['total_price'], 0, ',', '.'))?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["quantity"] ?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-end py-2 px-2 ">ini gambar</td>
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
                                <th class="text-center">Product_name</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Bukti_pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_processeds as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-end py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-end py-2 px-2 ">Rp.<?=esc(number_format($product['total_price'], 0, ',', '.'))?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["quantity"] ?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-end py-2 px-2 ">ini gambar</td>
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
                                <th class="text-center">Product_name</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">kuantitas</th>
                                <th class="text-center">status</th>
                                <th class="text-center">Bukti_pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products_cancelleds as $product): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="text-end py-2 px-2 "><?= $product["product_name"]?></td>
                                    <td class="text-end py-2 px-2 ">Rp.<?=esc(number_format($product['total_price'], 0, ',', '.'))?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["quantity"] ?></td>
                                    <td class="text-end py-2 px-2 "><?= $product["status"] ?></td>
                                    <td class="text-end py-2 px-2 ">ini gambar</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div id="buktiPembayaranModal" tabindex="-1" aria-hidden="true" class="fixed hidden bottom-0 right-0  z-50  overflow-y-auto overflow-x-hidden">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative  rounded-lg shadow ">
                        <div class="flex justify-between items-start p-4 rounded-t border-b bg-[#0F4C75]">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                Unggah Bukti Pembayaran
                            </h3>
                            <button type="button" onclick="closeModalBukti()" class="text-white bg-transparent hover:bg-white hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="buktiPembayaranModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.207a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <div class="p-6 space-y-6 bg-white">
                            <h3 id="productName" class="text-black text-xl"></h3>
                            <p id="productPrice" class="text-gray-500 text-md"></p>
                            <form id="form-upload-bukti" enctype="multipart/form-data">
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="block w-full text-sm text-gray-900 bg-white rounded-full  border border-gray-300 cursor-pointer focus:outline-none focus:ring-[#0F4C75] focus:border-blue-500  file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#0F4C75] file:text-white hover:file:bg-[#0F4C75] hover:file:cursor-pointer">
                            </form>
                            <button type="button" class="text-white bg-[#0F4C75] hover:bg-[#0F4C75] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center " onclick="uploadBukti()">Unggah</button>
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
    
    
    function uploadBukti(id, product_name, harga){
        const modal = document.getElementById("buktiPembayaranModal");
        const title = document.getElementById("productName");
        const price = document.getElementById("productPrice");

        title.textContent = product_name;
        price.textContent = "Rp." + harga;

        console.log(title); 
        modal.classList.remove("hidden");
    }
    function closeModalBukti(){
        const modal = document.getElementById("buktiPembayaranModal");

        modal.classList.add("hidden");
    }

    </script>
</body>

</html>