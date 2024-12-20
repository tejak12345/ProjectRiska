<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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

        .sidebar a {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }

        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md text-gray-800 p-4 fixed top-0 w-full z-50 border-b border-gray-100">
        <div class="container mx-auto flex justify-between items-center max-w-screen-xl px-6">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-2 rounded-xl shadow-lg">
                    <i data-lucide="shield" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                    LeafletPro</h1>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <div class="relative">
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>

                <!-- Profile Section -->
                <div class="flex items-center space-x-3 border-l pl-6">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold">Admin User</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-20 px-4 max-w-screen-xl">
        <div class="flex gap-6">
            <!-- Sidebar Menu -->
            <div class="w-64 bg-gradient-to-b from-blue-800 to-blue-900 rounded-2xl shadow-xl p-6">
                <ul class="space-y-3">
                    <li>
                        <a href="/admin/dashboard"
                            class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg transition-all">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products"
                            class="flex items-center text-white bg-white/10 p-3 rounded-lg transition-all">
                            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders"
                            class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg transition-all">
                            <i data-lucide="truck" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Orders</span>
                        </a>
                    </li>
                    <li class="pt-4 mt-4 border-t border-gray-700">
                        <a href="/admin/logout"
                            class="flex items-center text-red-400 hover:text-red-300 p-3 rounded-lg transition-all">
                            <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Create Product Form -->
            <div class="flex-1 bg-white rounded-2xl shadow-md p-8">
                <div class="mb-8">
                    <h2
                        class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                        Create New Product</h2>
                    <p class="text-gray-500 mt-1">Add a new product to your catalog</p>
                </div>

                <form action="/admin/products/store" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input type="text" name="name" id="name" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                        <input type="number" name="price" id="price" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="description"
                            class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Save Product
                        </button>
                        <a href="/admin/products"
                            class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>