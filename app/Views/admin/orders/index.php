<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders- LeafletPro</title>
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

            
                <!-- Profile Section -->
                <div class="flex items-center space-x-3 border-l pl-6">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white">
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
                            class="flex items-center text-gray-300 hover:text-white p-3 rounded-lg transition-all">
                            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                            <span class="font-medium">Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders"
                            class="flex items-center text-white bg-white/10 p-3 rounded-lg transition-all">
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

            <!-- Orders Content -->
            <div class="flex-1 ml-[300px]">
                <div class="bg-white rounded-2xl shadow-md p-8 mb-6">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h2
                                class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                                Orders Management</h2>
                            <p class="text-gray-500 mt-1">Track and manage customer orders</p>
                        </div>
                    </div>

                    <!-- Display Success Message -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-lg">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Search and Filter -->
                    <div class="flex gap-4 mb-6">
                        <div class="flex-1 relative">
                            <input type="text" placeholder="Search orders..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-2.5"></i>
                        </div>
                        <select
                            class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>All Status</option>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Completed</option>
                            <option>Cancelled</option>
                        </select>
                    </div>

              <!-- Orders Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="overflow-x-auto max-h-96 overflow-y-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Order ID</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Customer Name</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Total Price</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($orders as $order): ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">#<?= esc($order['id']) ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-gray-600"><?= esc($order['customer_name']) ?></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Rp <?= number_format($order['total'], 0, ',', '.') ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                                        <?php
                                        switch (strtolower($order['status'])) {
                                            case 'pending':
                                                echo 'bg-yellow-100 text-yellow-800';
                                                break;
                                            case 'processing':
                                                echo 'bg-blue-100 text-blue-800';
                                                break;
                                            case 'completed':
                                                echo 'bg-green-100 text-green-800';
                                                break;
                                            case 'cancelled':
                                                echo 'bg-red-100 text-red-800';
                                                break;
                                            default:
                                                echo 'bg-gray-100 text-gray-800';
                                        }
                                        ?>">
                                            <?= esc(ucfirst($order['status'])) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form action="/admin/orders/confirm/<?= esc($order['id']) ?>" method="post"
                                            class="inline-block">
                                            <button type="submit"
                                                class="action-button text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-lg px-3 py-1 transition-all duration-300 ease-in-out transform hover:scale-105">
                                                Confirm
                                            </button>
                                        </form>
                                        <form action="/admin/orders/cancel/<?= esc($order['id']) ?>" method="post"
                                            class="inline-block ml-2">
                                           
                                        </form>
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
        });
    </script>
</body>

</html>