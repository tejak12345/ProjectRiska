<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeafletPro Farmasi - Solusi Desain Informatif untuk Profesional Kesehatan</title>
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
    <!-- Updated Navbar Section with Responsive Design -->
    <nav class="bg-gradient-to-r from-[#0F4C75] to-[#1A73E8] text-white p-4 shadow-xl fixed top-0 w-full z-50">
        <div class="container mx-auto flex flex-wrap justify-between items-center">
            <div class="flex items-center space-x-3">
                <i data-lucide="file-text" class="w-10 h-10 text-white"></i>
                <h1 class="text-2xl font-bold tracking-tight">LeafletPro Farmasi</h1>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="lg:hidden">
                <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Navigation Links -->
            <div id="mobile-menu" class="hidden fixed inset-0 bg-[#0F4C75] lg:static lg:block lg:bg-transparent">
                <div class="flex flex-col lg:flex-row justify-center items-center h-full relative">
                    <!-- Close Button for Mobile -->
                    <button id="mobile-menu-close" class="absolute top-4 right-4 lg:hidden text-white">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>

                    <ul class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-6 text-center">
                        <li><a href="#beranda" class="hover:text-blue-200 transition duration-300 font-medium block py-2 lg:py-0">Beranda</a></li>
                        <li><a href="#layanan" class="hover:text-blue-200 transition duration-300 font-medium block py-2 lg:py-0">Layanan</a></li>
                        <li><a href="#portofolio" class="hover:text-blue-200 transition duration-300 font-medium block py-2 lg:py-0">Portofolio</a></li>
                        <li><a href="#harga" class="hover:text-blue-200 transition duration-300 font-medium block py-2 lg:py-0">Harga</a></li>
                        <li><a href="#kontak" class="hover:text-blue-200 transition duration-300 font-medium block py-2 lg:py-0">Kontak</a></li>
                    </ul>

                    <button class="mt-6 lg:mt-0 lg:ml-6 bg-white text-[#0F4C75] px-5 py-2 rounded-full hover:bg-blue-50 transition duration-300 flex items-center font-semibold shadow-md">
                        <a href="/auth/login" class="flex items-center">
    <i data-lucide="log-in" class="mr-2 w-5 h-5"></i>
    Masuk
</a>

                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Responsive Layout -->
    <section id="beranda" class="min-h-screen bg-gradient-to-br from-[#F5F9FC] to-[#E6F2FF] flex items-center pt-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full absolute bottom-0">
                <path fill="#0F4C75" fill-opacity="0.1" d="M0,128L48,138.7C96,149,192,171,288,176C384,181,480,171,576,149.3C672,128,768,96,864,101.3C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="container mx-auto flex flex-col lg:flex-row items-center relative z-10 px-4">
            <div class="w-full lg:w-1/2 lg:pr-10 text-center lg:text-left mb-8 lg:mb-0">
                <h2 class="text-3xl lg:text-5xl font-bold text-[#0F4C75] mb-6 leading-tight">Desain Leaflet Farmasi yang Profesional</h2>
                <p class="text-gray-700 mb-8 text-base lg:text-lg leading-relaxed">
                    Kami memahami kebutuhan komunikasi spesifik dalam dunia farmasi. Leaflet kami dirancang untuk menyampaikan informasi medis secara akurat, jelas, dan menarik.
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="bg-[#1A73E8] text-white px-7 py-3 rounded-full hover:bg-[#0F4C75] transition flex items-center justify-center shadow-lg">
                        <i data-lucide="file-text" class="mr-3"></i> Pesan Layanan
                    </button>
                    <button class="border-2 border-[#1A73E8] text-[#1A73E8] px-7 py-3 rounded-full hover:bg-blue-50 transition flex items-center justify-center">
                        Lihat Portofolio
                    </button>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="bg-white rounded-xl shadow-2xl p-6 transform transition hover:scale-105">
                    <img src="https://via.placeholder.com/600x400" alt="Leaflet Farmasi Profesional" class="rounded-lg w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section with Responsive Design -->
    <section id="layanan" class="py-16 bg-white">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#0F4C75] mb-12">Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#F5F9FC] p-8 rounded-xl shadow-md hover:shadow-xl transition group">
                    <div class="flex justify-center mb-6 text-[#1A73E8] group-hover:scale-110 transition">
                        <i data-lucide="pill" class="w-16 h-16"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#0F4C75]">Informasi Obat Komprehensif</h3>
                    <p class="text-gray-600">Detail lengkap penggunaan obat, efek samping, dan panduan praktis untuk pasien.</p>
                </div>
                <div class="bg-[#F5F9FC] p-8 rounded-xl shadow-md hover:shadow-xl transition group">
                    <div class="flex justify-center mb-6 text-[#1A73E8] group-hover:scale-110 transition">
                        <i data-lucide="book-open" class="w-16 h-16"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#0F4C75]">Edukasi Kesehatan Mendalam</h3>
                    <p class="text-gray-600">Materi edukasi mendalam untuk berbagai kondisi medis dan manajemen kesehatan.</p>
                </div>
                <div class="bg-[#F5F9FC] p-8 rounded-xl shadow-md hover:shadow-xl transition group">
                    <div class="flex justify-center mb-6 text-[#1A73E8] group-hover:scale-110 transition">
                        <i data-lucide="microscope" class="w-16 h-16"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-[#0F4C75]">Presentasi Produk Farmasi</h3>
                    <p class="text-gray-600">Desain informatif untuk memperkenalkan produk farmasi terbaru dengan profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section with Responsive Grid -->
    <section id="portofolio" class="py-16 bg-white">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#0F4C75] mb-12">Portofolio Leaflet Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Portfolio items remain the same, but with responsive grid classes -->
                <div class="bg-[#F5F9FC] rounded-xl overflow-hidden shadow-lg transform transition hover:scale-105 hover:shadow-xl group">
                    <!-- Content remains unchanged -->
                </div>
                <div class="bg-[#F5F9FC] rounded-xl overflow-hidden shadow-lg transform transition hover:scale-105 hover:shadow-xl group">
                    <!-- Content remains unchanged -->
                </div>
                <div class="bg-[#F5F9FC] rounded-xl overflow-hidden shadow-lg transform transition hover:scale-105 hover:shadow-xl group">
                    <!-- Content remains unchanged -->
                </div>
            </div>

            <!-- Portfolio Highlights with Responsive Layout -->
            <div class="mt-16 bg-[#F5F9FC] p-6 lg:p-10 rounded-xl shadow-lg">
                <h3 class="text-2xl lg:text-3xl font-bold text-[#0F4C75] mb-6">Mengapa Portofolio Kami Berbeda?</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <i data-lucide="award" class="w-12 h-12 mx-auto mb-4 text-[#1A73E8]"></i>
                        <h4 class="font-semibold text-[#0F4C75] mb-2">Kualitas Tinggi</h4>
                        <p class="text-gray-600">Desain profesional dengan standar medis tertinggi</p>
                    </div>
                    <div class="text-center">
                        <i data-lucide="target" class="w-12 h-12 mx-auto mb-4 text-[#1A73E8]"></i>
                        <h4 class="font-semibold text-[#0F4C75] mb-2">Presisi Informasi</h4>
                        <p class="text-gray-600">Akurasi dan kejelasan informasi medis</p>
                    </div>
                    <div class="text-center">
                        <i data-lucide="clipboard" class="w-12 h-12 mx-auto mb-4 text-[#1A73E8]"></i>
                        <h4 class="font-semibold text-[#0F4C75] mb-2">Desain Inovatif</h4>
                        <p class="text-gray-600">Pendekatan kreatif dalam komunikasi kesehatan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Harga Section with Responsive Pricing Cards -->
    <!-- Harga Section with Horizontal Pricing Cards -->
<section id="harga" class="py-16 bg-gray-50">
    <div class="container mx-auto text-center px-4">
        <h2 class="text-3xl lg:text-4xl font-bold text-[#0F4C75] mb-12">Paket Harga</h2>
        <div class="flex flex-col md:flex-row justify-center space-y-8 md:space-y-0 md:space-x-8">
            <div class="w-full md:w-1/2 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden flex flex-col md:flex-row transform transition hover:scale-105">
                <div class="w-full md:w-1/3 bg-[#1A73E8] text-white p-8 flex flex-col justify-center items-center">
                    <h3 class="text-2xl font-bold mb-4">Paket Standard</h3>
                    <div class="mb-4">
                        <span class="text-3xl font-bold">Rp 750.000</span>
                        <span class="block text-blue-100">per projek</span>
                    </div>
                </div>
                <div class="w-full md:w-2/3 p-8">
                    <ul class="space-y-4 mb-6 text-left">
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Desain Leaflet 1 Halaman</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Revisi Maksimal 2 Kali</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Konsultasi Desain</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i data-lucide="x" class="w-5 h-5 mr-3"></i>
                            <span>Desain Infografis Tambahan</span>
                        </li>
                    </ul>
                    <button class="w-full bg-[#1A73E8] text-white py-3 rounded-full hover:bg-[#0F4C75] transition">
                        Pilih Paket Standard
                    </button>
                </div>
            </div>

            <div class="w-full md:w-1/2 bg-[#0F4C75] rounded-xl shadow-2xl overflow-hidden flex flex-col md:flex-row transform transition hover:scale-105">
                <div class="w-full md:w-1/3 bg-yellow-400 text-[#0F4C75] p-8 flex flex-col justify-center items-center">
                    <h3 class="text-2xl font-bold mb-4">Paket Premium</h3>
                    <div class="mb-4">
                        <span class="text-3xl font-bold">Rp 1.500.000</span>
                        <span class="block text-[#0F4C75]/70">per projek</span>
                    </div>
                </div>
                <div class="w-full md:w-2/3 p-8 bg-white">
                    <ul class="space-y-4 mb-6 text-left">
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Desain Leaflet 2-3 Halaman</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Revisi Maksimal 4 Kali</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Konsultasi Desain Mendalam</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-3 text-green-500"></i>
                            <span>Desain Infografis Tambahan</span>
                        </li>
                    </ul>
                    <button class="w-full bg-[#0F4C75] text-white py-3 rounded-full hover:bg-[#1A73E8] transition">
                        Pilih Paket Premium
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

   
        <!-- Footer with Responsive Layout -->
        <footer class="bg-[#0F4C75] text-white py-12">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center space-x-3 mb-4">
                        <i data-lucide="file-text" class="w-10 h-10 text-white"></i>
                        <h1 class="text-xl font-bold">LeafletPro Farmasi</h1>
                    </div>
                    <p class="text-gray-300">Solusi desain leaflet profesional untuk komunikasi farmasi yang efektif.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-white hover:text-blue-200 transition">
                            <i data-lucide="facebook" class="w-6 h-6"></i>
                        </a>
                        <a href="#" class="text-white hover:text-blue-200 transition">
                            <i data-lucide="instagram" class="w-6 h-6"></i>
                        </a>
                        <a href="#" class="text-white hover:text-blue-200 transition">
                            <i data-lucide="linkedin" class="w-6 h-6"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-semibold mb-4">Layanan</h4>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:text-white transition">Informasi Obat</a></li>
                            <li><a href="#" class="hover:text-white transition">Edukasi Kesehatan</a></li>
                            <li><a href="#" class="hover:text-white transition">Presentasi Produk</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4">Perusahaan</h4>
                        <ul class="space-y-2 text-gray-300">
                            <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white transition">Portofolio</a></li>
                            <li><a href="#" class="hover:text-white transition">Kontak</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-center">
                            <i data-lucide="mail" class="w-5 h-5 mr-3"></i>
                            kontak@leafletprofarmasi.com
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="phone" class="w-5 h-5 mr-3"></i>
                            +62 812-3456-7890
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-3"></i>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto mt-8 pt-6 border-t border-gray-700 text-center">
                <p class="text-gray-400">&copy; 2024 LeafletPro Farmasi. Hak Cipta Dilindungi.</p>
            </div>
        </footer>

        <!-- Mobile Menu JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
                const mobileMenuClose = document.getElementById('mobile-menu-close');
                const mobileMenu = document.getElementById('mobile-menu');

                mobileMenuToggle.addEventListener('click', () => {
                    mobileMenu.classList.remove('hidden');
                });

                mobileMenuClose.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });

                // Close mobile menu when a link is clicked
                const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                    });
                });
            });

            // Lucide Icons Initialization
            document.addEventListener('DOMContentLoaded', () => {
                lucide.createIcons();
            });
        </script>

        <script src="https://unpkg.com/lucide@latest"></script>
    </body>
</html>