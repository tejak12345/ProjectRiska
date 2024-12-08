<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
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
    <div class="flex pt-20 min-h-screen">
        <!-- Sidebar Menu -->
        <div class="w-64 bg-white rounded-xl shadow-md p-6 border-l-4 border-[#2C3E50] min-h-screen sticky top-0 ml-4">
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
                    <a href="/admin/orders" class="flex items-center hover:bg-gray-100 p-3 rounded-lg">
                        <i data-lucide="truck" class="w-5 h-5 mr-3"></i>
                        Manage Orders
                    </a>
                </li>
                <li>
                    <a href="/admin/consultations" class="flex items-center hover:bg-gray-100 p-3 rounded-lg">
                        <i data-lucide="message-square" class="w-5 h-5 mr-3"></i>
                        Manage Consultations
                    </a>
                </li>
                <li>
                    <a href="/admin/projects" class="flex items-center text-[#2C3E50] bg-gray-100 p-3 rounded-lg">
                        <i data-lucide="clipboard-list" class="w-5 h-5 mr-3"></i>
                        Manage Projects
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

        <!-- Manage Projects Content -->
        <div class="flex-1 p-6">
            <div class="bg-white rounded-xl shadow-md p-6 mb-6 border-t-4 border-[#2C3E50]">
                <h2 class="text-2xl font-bold text-[#2C3E50] mb-6">Manage Projects</h2>

                <!-- Create Project Button -->
                <div class="flex justify-end mb-4">
                    <a href="/admin/projects/create"
                        class="bg-[#2C3E50] text-white py-2 px-4 rounded-lg flex items-center hover:bg-[#34495E] transition">
                        <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                        Create Project
                    </a>
                </div>

                <!-- Projects Table -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="border-b border-gray-200">
                                <th class="py-2 text-left">Name</th>
                                <th class="py-2 text-left">Status</th>
                                <th class="py-2 text-left">Start Date</th>
                                <th class="py-2 text-left">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- PHP Loop for Projects -->
                            <?php foreach ($projects as $project): ?>
                                <tr class="border-b border-gray-200">
                                    <td class="py-2"><?= esc($project['name']) ?></td>
                                    <td class="py-2"><?= esc($project['status']) ?></td>
                                    <td class="py-2"><?= esc($project['start_date']) ?></td>
                                    <td class="py-2"><?= esc($project['end_date']) ?></td>
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