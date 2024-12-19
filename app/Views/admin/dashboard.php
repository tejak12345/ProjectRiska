<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - LeafletPro</title>
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
            background: linear-gradient(180deg, #2C3E50 0%, #34495E 100%);
            width: 280px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .table th {
            background-color: #f8fafc;
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
    <nav class="bg-white text-gray-800 p-4 shadow-lg fixed top-0 w-full z-50 border-b border-gray-100">
        <div class="container mx-auto flex justify-between items-center max-w-screen-xl px-6">
            <div class="flex items-center space-x-3">
                <div class="bg-[#2C3E50] p-2 rounded-lg">
                    <i data-lucide="shield" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-[#2C3E50]">LeafletPro</h1>
            </div>
            
            <!-- Profile & Hamburger Menu for Mobile -->
            <div class="flex items-center space-x-3 border-l pl-6">
                <!-- Ikon Profil Admin -->
                <i data-lucide="user" class="w-10 h-10 text-[#2C3E50] border-2 border-[#2C3E50] rounded-full flex items-center justify-center"></i>
                <div>
                    <p class="text-sm font-semibold"><?= esc($admin['username']) ?></p>
                    <p class="text-xs text-gray-500"><?= esc(ucfirst($admin['role'])) ?></p>
                </div>
            </div>
            <!-- Mobile Hamburger Menu -->
            <div class="lg:hidden">
                <button id="hamburger" class="text-gray-600">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
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
                            class="flex items-center text-white p-3 rounded-lg hover:bg-white/10 transition-all">
                            <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products"
                            class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg transition-all">
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

            <!-- Dashboard Content -->
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-md p-8 mb-6">
                    <h2 class="text-2xl font-bold text-[#2C3E50] mb-8">Dashboard Overview</h2>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div
                            class="stat-card bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-white/20 p-3 rounded-xl">
                                    <i data-lucide="package" class="w-6 h-6"></i>
                                </div>
                                <span class="text-2xl font-bold"><?= esc($totalProducts) ?></span>
                            </div>
                            <h3 class="font-medium">Total Products</h3>
                        </div>

                        <div
                            class="stat-card bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-white/20 p-3 rounded-xl">
                                    <i data-lucide="truck" class="w-6 h-6"></i>
                                </div>
                                <span class="text-2xl font-bold">128</span>
                            </div>
                            <h3 class="font-medium">Total Orders</h3>
                        </div>

                        <div
                            class="stat-card bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="bg-white/20 p-3 rounded-xl">
                                    <i data-lucide="users" class="w-6 h-6"></i>
                                </div>
                                <span class="text-2xl font-bold"><?= $activeUsersCount ?></span>
                            </div>
                            <h3 class="font-medium">Active Users</h3>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-white rounded-2xl">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-[#2C3E50]">Recent Orders</h3>
                            <button class="text-blue-600 hover:text-blue-700 flex items-center gap-2 text-sm">
                                View All
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="py-4 px-4 text-left text-sm font-medium text-gray-600">Order ID</th>
                                        <th class="py-4 px-4 text-left text-sm font-medium text-gray-600">Customer</th>
                                        <th class="py-4 px-4 text-left text-sm font-medium text-gray-600">Status</th>
                                        <th class="py-4 px-4 text-right text-sm font-medium text-gray-600">Total</th>
                                        <th class="py-4 px-4 text-right text-sm font-medium text-gray-600">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentOrders as $order): ?>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-4 px-4 text-sm">#<?= $order['order_id'] ?></td>
                                            <td class="py-4 px-4 text-sm font-medium"><?= $order['customer_name'] ?></td>
                                            <td class="py-4 px-4">
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full <?= $order['status'] == 'Completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' ?>">
                                                    <?= ucfirst($order['status']) ?>
                                                </span>
                                            </td>
                                            <td class="py-4 px-4 text-right text-sm font-medium">Rp
                                                <?= number_format($order['total'], 0, ',', '.') ?>
                                            </td>
                                            <td class="py-4 px-4 text-right">
                                                <div class="flex justify-end gap-2">
                                                    <button
                                                        class="action-button p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                                        <i data-lucide="eye" class="w-4 h-4"></i>
                                                    </button>
                                                    <button
                                                        class="action-button p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
            
            const hamburger = document.getElementById("hamburger");
            const sidebar = document.querySelector(".sidebar");
            hamburger.addEventListener('click', () => {
                sidebar.classList.toggle("lg:block");
                sidebar.classList.toggle("hidden");
            });
        });
    </script>
</body>

</html>
