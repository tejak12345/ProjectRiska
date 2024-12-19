<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
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
            /* Memberikan jarak di bawah navbar */
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            /* Tentukan lebar sidebar */
            background-color: #ffffff;
            box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-right: 20px;
            /* Memberikan jarak antara sidebar dan konten */
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
                    <img src="https://via.placeholder.com/40" alt="Admin Profile" class="rounded-full w-10 h-10">
                    <div>
                        <p class="text-sm font-semibold">Admin User</p>
                        <p class="text-xs text-gray-400">Administrator</p>
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
                        <a href="/admin/products" class="flex items-center hover:bg-gray-100 p-3 rounded-lg">
                            <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                            Manage Products
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders" class="flex items-center text-[#2C3E50] bg-gray-100 p-3 rounded-lg">
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

            <!-- Manage Orders Content -->
            <div class="content-area bg-gray-50 rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#2C3E50]">
                <h2 class="text-2xl font-bold text-[#2C3E50] mb-6">Manage Orders</h2>

                <!-- Orders Table -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-3 text-left">Order ID</th>
                                <th class="py-3 text-left">User ID</th>
                                <th class="py-3 text-left">Total Price</th>
                                <th class="py-3 text-left">Status</th>
                                <th class="py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3"><?= esc($order['id']) ?></td>
                                    <td class="py-3"><?= esc($order['user_id']) ?></td>
                                    <td class="py-3"><?= esc($order['total_price']) ?></td>
                                    <td class="py-3"><?= esc($order['status']) ?></td>
                                    <td class="py-3 text-right table-actions">
                                        <a href="/admin/orders/view/<?= esc($order['id']) ?>"
                                            class="text-blue-600 hover:text-blue-800 mr-2">
                                            <i data-lucide="eye" class="w-5 h-5"></i> View
                                        </a>
                                        <a href="/admin/orders/update/<?= esc($order['id']) ?>"
                                            class="text-green-600 hover:text-green-800">
                                            <i data-lucide="edit" class="w-5 h-5"></i> Update
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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