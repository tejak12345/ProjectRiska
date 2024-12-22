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

    .sidebar a::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 0;
        background: rgba(255, 255, 255, 0.1);
        transition: width 0.3s ease;
    }

    .sidebar a:hover::before {
        width: 100%;
    }

    .stat-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1));
        transform: skewX(-15deg);
        transition: transform 0.5s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card:hover::after {
        transform: translateX(200%) skewX(-15deg);
    }

    .table th {
        background-color: #f8fafc;
        position: sticky;
        top: 0;
        z-index: 10;
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

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-shadow {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                    0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
                <!-- Search Bar -->
                <div class="hidden md:flex items-center bg-gray-100 rounded-lg px-3 py-2">
                    <i data-lucide="search" class="w-4 h-4 text-gray-500 mr-2"></i>
                    <input type="text" placeholder="Search..." class="bg-transparent outline-none text-sm w-48">
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
            <div class="flex-1 ml-[300px]">
                <div class="bg-white rounded-2xl shadow-md p-8 mb-6">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                            Dashboard Overview</h2>
                       
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="stat-card bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="glass-effect p-3 rounded-xl">
                                    <i data-lucide="package" class="w-6 h-6"></i>
                                </div>
                                <span class="text-3xl font-bold"><?= esc($totalProducts) ?></span>
                            </div>
                            <h3 class="font-medium text-emerald-100">Total Products</h3>
                            <p class="text-sm text-emerald-100 mt-2">
                                <i data-lucide="trending-up" class="w-4 h-4 inline-block mr-1"></i>
                                +12.5% from last month
                            </p>
                        </div>

                       <div class="stat-card bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl p-6 text-white shadow-lg">
    <div class="flex items-center justify-between mb-4">
        <div class="glass-effect p-3 rounded-xl">
            <i data-lucide="truck" class="w-6 h-6"></i>
        </div>
        <span class="text-3xl font-bold"><?= $totalOrders ?></span> <!-- Menampilkan jumlah total pesanan -->
                        </div>
                        <h3 class="font-medium text-blue-100">Total Orders</h3>
                        <p class="text-sm text-blue-100 mt-2">
                            <i data-lucide="trending-up" class="w-4 h-4 inline-block mr-1"></i>
                            +8.2% from last month
                        </p>
                    </div>


                        <div class="stat-card bg-gradient-to-br from-violet-400 to-violet-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <div class="glass-effect p-3 rounded-xl">
                                    <i data-lucide="users" class="w-6 h-6"></i>
                                </div>
                                <span class="text-3xl font-bold"><?= $activeUsersCount ?></span>
                            </div>
                            <h3 class="font-medium text-violet-100">Active Users</h3>
                            <p class="text-sm text-violet-100 mt-2">
                                <i data-lucide="trending-up" class="w-4 h-4 inline-block mr-1"></i>
                                +15.3% from last month
                            </p>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-white rounded-2xl card-shadow">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Recent Orders</h3>
                            <button class="text-blue-600 hover:text-blue-700 flex items-center gap-2 text-sm font-medium">
                                View All
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <div class="overflow-x-auto rounded-xl">
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-200">
                <th class="py-4 px-4 text-left text-sm font-semibold text-gray-600">Order ID</th>
                <th class="py-4 px-4 text-left text-sm font-semibold text-gray-600">Customer</th>
                <th class="py-4 px-4 text-left text-sm font-semibold text-gray-600">Status</th>
                <th class="py-4 px-4 text-right text-sm font-semibold text-gray-600">Total</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recentOrders as $order): ?>
                                        <tr class="border-b border-gray-100">
                                            <td class="py-4 px-4 text-sm">#<?= $order['user_id'] ?></td>
                                            <td class="py-4 px-4">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3">
                                                        <i data-lucide="user" class="w-4 h-4 text-gray-500"></i>
                                                    </div>
                                                    <span class="text-sm font-medium"><?= $order['customer_name'] ?></span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-4">
                                                <span
                                                    class="px-3 py-1 text-xs font-medium rounded-full inline-flex items-center gap-1
                                                <?= $order['status'] == 'Completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' ?>">
                                                    <?php if ($order['status'] == 'Completed'): ?>
                                                        <i data-lucide="check-circle" class="w-3 h-3"></i>
                                                    <?php else: ?>
                                                        <i data-lucide="clock" class="w-3 h-3"></i>
                                                    <?php endif; ?>
                                                    <?= ucfirst($order['status']) ?>
                                                </span>
                                            </td>
                                            <td class="py-4 px-4 text-right text-sm font-medium">Rp
                                                <?= number_format($order['total'], 0, ',', '.') ?></td>
                                     
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

                                                    // Mobile menu toggle
                                                    const hamburger = document.getElementById("hamburger");
                                                    const sidebar = document.querySelector(".sidebar");

                                                    if (hamburger && sidebar) {
                                                        hamburger.addEventListener('click', () => {
                                                            sidebar.classList.toggle("hidden");
                                                            sidebar.classList.toggle("fixed");
                                                            sidebar.classList.toggle("inset-0");
                                                            sidebar.classList.toggle("z-50");
                                                        });
                                                    }

                                                    // Add smooth scroll to sidebar links
                                                    document.querySelectorAll('.sidebar a').forEach(link => {
                                                        link.addEventListener('click', (e) => {
                                                            const href = link.getAttribute('href');
                                                            if (href.startsWith('#')) {
                                                                e.preventDefault();
                                                                document.querySelector(href).scrollIntoView({
                                                                    behavior: 'smooth'
                                                                });
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            </body>
                                            
                                            </html>