<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product - LeafletPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        .sidebar {
            background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
            width: 280px;
            transition: all 0.3s ease;
            position: fixed;
            height: calc(100vh - 100px);
            overflow-y: auto;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
            transition: all 0.3s ease;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md text-gray-800 p-4 fixed top-0 w-full z-50 border-b border-gray-100">
        <div class="container mx-auto flex justify-between items-center max-w-screen-xl px-6">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-2 rounded-xl shadow-lg">
                    <i data-lucide="leaf" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                    LeafletPro</h1>
            </div>

            <!-- Profile & Notifications -->
            <div class="flex items-center space-x-6">
                <button class="relative p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                </button>

                <div class="flex items-center space-x-3 border-l pl-6">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold">Admin</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-20 px-4 max-w-screen-xl">
        <div class="flex gap-6">
            <!-- Sidebar -->
            <div class="sidebar rounded-2xl shadow-xl p-6 w-64">
                <ul class="space-y-3">
                    <li>
                        <a href="dashboard.html" class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="products.html" class="flex items-center text-white bg-white/10 p-3 rounded-lg">
                            <i data-lucide="shopping-bag" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="categories.html" class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg">
                            <i data-lucide="tag" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="orders.html" class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg">
                            <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Orders</span>
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-gray-700">
                        <a href="login.html" class="flex items-center text-red-400 hover:text-red-300 p-3 rounded-lg">
                            <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Create Product Form -->
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-md p-8">
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                                    Tambah Produk Baru</h2>
                                <p class="text-gray-500 mt-1">Tambahkan produk baru ke inventori anda</p>
                            </div>
                            <a href="products.html" class="text-gray-500 hover:text-gray-700 flex items-center">
                                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                                Kembali ke Produk
                            </a>
                        </div>
                    </div>

                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                                <input type="text" name="name" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp)</label>
                                <input type="number" name="price" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="category" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Kategori</option>
                                <option value="1">Elektronik</option>
                                <option value="2">Pakaian</option>
                                <option value="3">Rumah Tangga</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="description" rows="4" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Produk</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                                <input type="file" name="images[]" multiple accept="image/*" class="hidden" id="imageInput">
                                <label for="imageInput" class="cursor-pointer">
                                    <i data-lucide="upload" class="w-8 h-8 text-gray-400 mx-auto mb-2"></i>
                                    <p class="text-sm text-gray-500">Klik untuk upload atau drag and drop</p>
                                    <p class="text-xs text-gray-400 mt-1">PNG, JPG maksimal 10MB</p>
                                </label>
                            </div>
                        </div>

                        <div class="flex space-x-4 pt-4">
                            <button type="submit"
                                class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                                Simpan Produk
                            </button>
                            <a href="products.html"
                                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>