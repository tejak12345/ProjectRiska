<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - LeafletPro Farmasi</title>
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
    <div class="container mx-auto mt-24 px-4 max-w-4xl">
        <!-- Error Messages -->
        <?php if (session()->has('errors')): ?>
        <div class="mb-4">
            <?php foreach (session('errors') as $error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2">
                <?= $error ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Success Message -->
        <?php if (session()->has('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <?= session('success') ?>
        </div>
        <?php endif; ?>

        <!-- Checkout Form -->
        <div class="bg-white rounded-xl shadow-md mb-6">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-[#0F4C75] mb-6">Formulir Pembelian</h2>

                <form method="POST" action="<?= base_url('process-checkout') ?>" class="space-y-6">
                    <!-- Hidden Product ID -->
                    <input type="hidden" name="product_id" value="<?= $produk['id'] ?>">

                    <!-- Order Summary -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold mb-4">Ringkasan Pesanan</h3>
                        <div class="flex items-center space-x-4">
                            <img src="<?= $produk['gambar'] ?>" alt="<?= $produk['nama'] ?>"
                                class="w-24 h-24 object-cover rounded-lg">
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium"><?= $produk['nama'] ?></h4>
                                        <p class="text-sm text-gray-600"><?= $produk['deskripsi'] ?></p>
                                    </div>
                                    <p class="font-bold text-[#1A73E8]">Rp
                                        <?= number_format($produk['harga'], 0, ',', '.') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold">Total Pembayaran</span>
                                <span class="font-bold text-lg text-[#1A73E8]">Rp
                                    <?= number_format($produk['harga'], 0, ',', '.') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div>
                        <h3 class="font-semibold mb-4">Informasi Pembeli</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="full_name" placeholder="Nama Lengkap" required
                                value="<?= old('full_name') ?>"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            <input type="email" name="email" placeholder="Email" required value="<?= old('email') ?>"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            <input type="tel" name="phone" placeholder="Nomor Telepon" required
                                value="<?= old('phone') ?>"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                            <input type="text" name="institution" placeholder="Institusi/Perusahaan (Opsional)"
                                value="<?= old('institution') ?>"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div>
                        <h3 class="font-semibold mb-4">Metode Pembayaran</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Credit Card -->
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="credit-card"
                                    class="hidden payment-radio"
                                    <?= old('payment_method') === 'credit-card' ? 'checked' : '' ?>>
                                <div
                                    class="p-4 rounded-lg border flex items-center justify-center space-x-2 transition payment-method-box">
                                    <i data-lucide="credit-card" class="w-5 h-5"></i>
                                    <span>Kartu Kredit</span>
                                </div>
                            </label>

                            <!-- E-Wallet -->
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="e-wallet" class="hidden payment-radio"
                                    <?= old('payment_method') === 'e-wallet' ? 'checked' : '' ?>>
                                <div
                                    class="p-4 rounded-lg border flex items-center justify-center space-x-2 transition payment-method-box">
                                    <i data-lucide="wallet" class="w-5 h-5"></i>
                                    <span>E-Wallet</span>
                                </div>
                            </label>

                            <!-- Bank Transfer -->
                            <label class="cursor-pointer">
                                <input type="radio" name="payment_method" value="bank-transfer"
                                    class="hidden payment-radio"
                                    <?= old('payment_method') === 'bank-transfer' ? 'checked' : '' ?>>
                                <div
                                    class="p-4 rounded-lg border flex items-center justify-center space-x-2 transition payment-method-box">
                                    <i data-lucide="landmark" class="w-5 h-5"></i>
                                    <span>Transfer Bank</span>
                                </div>
                            </label>
                        </div>

                        <!-- Payment Details -->
                        <div class="mt-4 payment-details">
                            <!-- Credit Card Details -->
                            <div id="credit-card-details" class="payment-form hidden">
                                <div class="space-y-4">
                                    <input type="text" name="card_number" placeholder="Nomor Kartu"
                                        class="w-full px-4 py-2 border rounded-lg" />
                                    <div class="grid grid-cols-2 gap-4">
                                        <input type="text" name="expiry" placeholder="MM/YY"
                                            class="px-4 py-2 border rounded-lg" />
                                        <input type="text" name="cvv" placeholder="CVV"
                                            class="px-4 py-2 border rounded-lg" />
                                    </div>
                                </div>
                            </div>

                            <!-- E-Wallet Details -->
                            <div id="e-wallet-details" class="payment-form hidden">
                                <select name="ewallet_provider" class="w-full px-4 py-2 border rounded-lg">
                                    <option value="">Pilih E-Wallet</option>
                                    <option value="gopay" <?= old('ewallet_provider') === 'gopay' ? 'selected' : '' ?>>
                                        GoPay</option>
                                    <option value="ovo" <?= old('ewallet_provider') === 'ovo' ? 'selected' : '' ?>>OVO
                                    </option>
                                    <option value="dana" <?= old('ewallet_provider') === 'dana' ? 'selected' : '' ?>>
                                        DANA</option>
                                </select>
                            </div>

                            <!-- Bank Transfer Details -->
                            <div id="bank-transfer-details" class="payment-form hidden">
                                <select name="bank" class="w-full px-4 py-2 border rounded-lg">
                                    <option value="">Pilih Bank</option>
                                    <option value="bca" <?= old('bank') === 'bca' ? 'selected' : '' ?>>BCA</option>
                                    <option value="mandiri" <?= old('bank') === 'mandiri' ? 'selected' : '' ?>>Mandiri
                                    </option>
                                    <option value="bni" <?= old('bank') === 'bni' ? 'selected' : '' ?>>BNI</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-[#1A73E8] text-white py-3 rounded-lg hover:bg-[#0F4C75] transition font-semibold">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        // Payment method selection handling
        const paymentRadios = document.querySelectorAll('.payment-radio');
        const paymentForms = document.querySelectorAll('.payment-form');
        const paymentBoxes = document.querySelectorAll('.payment-method-box');

        function updatePaymentForm() {
            const selectedMethod = document.querySelector('.payment-radio:checked').value;

            // Hide all forms first
            paymentForms.forEach(form => form.classList.add('hidden'));

            // Show selected form
            document.getElementById(`${selectedMethod}-details`).classList.remove('hidden');

            // Update styling for payment method boxes
            paymentBoxes.forEach(box => {
                box.classList.remove('border-[#1A73E8]', 'bg-blue-50');
            });

            const selectedBox = document.querySelector(`input[value="${selectedMethod}"]`)
                .closest('label')
                .querySelector('.payment-method-box');

            selectedBox.classList.add('border-[#1A73E8]', 'bg-blue-50');
        }

        // Initialize payment form visibility
        const defaultMethod = document.querySelector('.payment-radio:checked');
        if (defaultMethod) {
            updatePaymentForm();
        }

        // Add change event listeners
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', updatePaymentForm);
        });
    });
    </script>
</body>

</html>