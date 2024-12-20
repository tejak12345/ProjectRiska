<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - LeafletPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8fafc;
    }

    .main-content {
        display: flex;
        margin-top: 80px;
        min-height: calc(100vh - 80px);
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

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .table tr {
        transition: all 0.2s ease;
    }

    .table tr:hover {
        background-color: #f1f5f9;
    }

    .action-button {
        transition: all 0.2s ease;
    }

    .action-button:hover {
        transform: scale(1.05);
    }
    </style>
</head>

<body class="bg-gray-50">
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
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                </div>

                <!-- Profile Section -->
                <div class="flex items-center space-x-3 border-l pl-6">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold"><?= esc($admin['username']) ?></p>
                        <p class="text-xs text-gray-500"><?= esc(ucfirst($admin['role'])) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-20 px-4 max-w-screen-xl">
        <div class="main-content">
            <!-- Sidebar Menu -->
            <div class="sidebar rounded-2xl shadow-xl p-6 mr-6 hidden lg:block">
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

            <!-- Products Content -->
            <div class="flex-1 ml-[300px]">
                <div class="bg-white rounded-2xl shadow-md p-8 mb-6">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                                Products Management</h2>
                            <p class="text-gray-500 mt-1">Manage your product catalog</p>
                        </div>
                        <a href="/admin/products/create"
                            class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                            Add New Product
                        </a>
                    </div>

                    <!-- Search and Filter -->
                    <div class="flex gap-4 mb-6">
                        <div class="flex-1 relative">
                            <input type="text" name="search" value="<?= esc($search) ?>" 
                                placeholder="Search products..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"></i>
                        </div>
                        <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>All Categories</option>
                            <option>Electronics</option>
                            <option>Clothing</option>
                            <option>Accessories</option>
                        </select>
                    </div>

                    <!-- Products Table -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Image</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Product Name</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Price</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Description</th>
                                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php foreach ($products as $product): ?>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <?php if ($product['image'] && file_exists(ROOTPATH . '/public/img/products/' . $product['image'])): ?>
                                            <img src="<?= base_url('/img/products/' . $product['image']) ?>" 
                                                alt="<?= esc($product['name']) ?>"
                                                class="w-16 h-16 rounded-lg object-cover shadow-sm">
                                            <?php else: ?>
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                                <i data-lucide="image" class="w-8 h-8 text-gray-400"></i>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900"><?= esc($product['name']) ?></div>
                                            <div class="text-xs text-gray-500">ID: #<?= esc($product['id']) ?></div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                $<?= esc(number_format($product['price'], 2)) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="text-sm text-gray-600 max-w-xs truncate">
                                                <?= esc($product['description']) ?>
                                            </p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-end gap-2">
                                                <button class="action-button p-2 text-blue-600 hover:bg-blue-50 rounded-lg"
                                                    title="View Details">
                                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                                </button>
                                                <a href="/admin/products/edit/<?= esc($product['id']) ?>"
                                                    class="action-button p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg"
                                                    title="Edit Product">
                                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                                </a>
                                                <button class="action-button p-2 text-red-600 hover:bg-red-50 rounded-lg"
                                                    title="Delete Product"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="flex items-center justify-between px-6 py-4 border-t border-gray-100">
                            <div class="text-sm text-gray-500">
                                Showing <span class="font-medium"><?= ($pager->getCurrentPage() - 1) * 5 + 1 ?></span> to
                                <span class="font-medium"><?= min($pager->getCurrentPage() * 5, $totalProducts) ?></span> of
                                <span class="font-medium"><?= $totalProducts ?></span> products
                            </div>

                            <?php if ($totalProducts > 5): ?>
                            <div class="flex gap-2">
                                <?= $pager->links('default', 'bootstrap') ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
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