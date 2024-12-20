<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        .main-content {
            display: flex;
            margin-top: 80px;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-right: 20px;
        }

        .content-area {
            flex-grow: 1;
            padding: 20px;
            background-color: #f5f5f5;
            min-height: 100vh;
            overflow-y: auto;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
        }

        .table th {
            background-color: #f1f1f1;
        }

        .table-actions a {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .table-actions a i {
            width: 16px;
            height: 16px;
        }

        .table tr:hover {
            background-color: #f9f9f9;
        }

        nav {
            z-index: 10;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-[#2C3E50] text-white p-4 shadow-md fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center max-w-screen-xl px-6">
            <div class="flex items-center space-x-3">
                <i data-lucide="shield" class="w-8 h-8"></i>
                <h1 class="text-xl font-bold">LeafletPro Admin Panel</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button id="notifikasi-toggle" class="hover:text-gray-300 transition">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    
                    <div class="flex items-center space-x-3 border-l pl-6">
    <!-- Ikon Profil Admin -->
    <i data-lucide="user" class="w-10 h-10 text-[#2C3E50] border-2 border-[#2C3E50] rounded-full flex items-center justify-center">
    </i>
    <div>
        <p class="text-sm font-semibold"><?= esc($admin['username']) ?></p>
                            <p class="text-xs text-gray-500"><?= esc(ucfirst($admin['role'])) ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container mx-auto mt-20 px-4 max-w-screen-xl">
        <div class="main-content">
            <!-- Sidebar Menu -->
            <div class="sidebar bg-white rounded-xl shadow-md p-6 border-l-4 border-[#2C3E50]">
                <ul class="space-y-4">
                    <li>
                        <a href="/admin/dashboard" class="flex items-center hover:bg-gray-100 p-3 rounded-lg">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products" class="flex items-center text-[#2C3E50] bg-gray-100 p-3 rounded-lg">
                            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                            Manage Products
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders" class="flex items-center hover:bg-gray-100 p-3 rounded-lg">
                            <i data-lucide="truck" class="w-5 h-5 mr-3"></i>
                            Manage Orders
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout" class="flex items-center hover:bg-gray-100 p-3 rounded-lg text-red-600">
                            <i data-lucide="log-out" class="w-5 h-5 mr-3"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Manage Products Content -->
            <div class="content-area bg-gray-50 rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#2C3E50]">
                <h2 class="text-2xl font-bold text-[#2C3E50] mb-6">Manage Products</h2>

                <!-- Product Table -->
<div class="bg-white rounded-xl shadow-lg p-6">
    <!-- Header Area -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-2">
            <h3 class="text-xl font-bold text-[#2C3E50]">Products Catalog</h3>
            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">5 Products</span>
        </div>
        <a href="/admin/products/create"
            class="flex items-center bg-[#2C3E50] text-white py-2 px-4 rounded-lg hover:bg-[#34495E] transition-colors duration-200">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
            Create New Product
        </a>
    </div>

   <!-- Search and Filter Area -->
<div class="mb-4 flex gap-4">
    <div class="relative flex-1">
        <form method="get" action="<?= current_url() ?>">
            <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Search products..."
                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#2C3E50] focus:border-transparent">
            <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"></i>
        </form>
    </div>
</div>

<!-- Table -->
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left">
        <thead class="text-xs uppercase bg-gray-50 rounded-lg">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-500">Image</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-500">Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-500">Price</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-500">Description</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-500 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4">
                        <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                            <img src="<?= base_url('/img/products/' . $product['image']) ?>" alt="Product Image"
                                class="w-16 h-16 rounded-lg object-cover border border-gray-200">
                        <?php else: ?>
                            <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center">
                                <i data-lucide="image" class="w-8 h-8 text-gray-400"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <?= esc($product['name']) ?>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            $<?= esc(number_format($product['price'], 2)) ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                        <?= esc($product['description']) ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="/admin/products/edit/<?= esc($product['id']) ?>"
                                class="font-medium text-blue-600 hover:text-blue-800 bg-blue-50 p-2 rounded-lg transition-colors duration-200">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <a href="/admin/products/delete/<?= esc($product['id']) ?>"
                                class="font-medium text-red-600 hover:text-red-800 bg-red-50 p-2 rounded-lg transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to delete this product?')">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="flex items-center justify-between mt-4">
    <div class="text-sm text-gray-500">
        Showing <span class="font-medium"><?= ($pager->getCurrentPage() - 1) * 5 + 1 ?></span> to
        <span class="font-medium"><?= min($pager->getCurrentPage() * 5, $totalProducts) ?></span> of
        <span class="font-medium"><?= $totalProducts ?></span> results
    </div>
    <div class="flex gap-2">
        <?= $pager->links('default', 'bootstrap') ?>
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