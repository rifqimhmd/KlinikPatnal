<header class="bg-white text-gray-800 shadow-sm sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center px-6 py-3">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/Logo.PNG') }}" alt="Klinik Patnal" class="h-12 w-auto drop-shadow-sm">
        </div>

        <!-- Navigasi Desktop -->
        <nav class="hidden md:flex space-x-8 font-medium text-base">
            <a href="/" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Beranda</a>
            <a href="/artikel" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Artikel</a>
            <a href="/tentang" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Tentang</a>
            <a href="/kontak" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Kontak</a>
        </nav>

        <!-- Tombol Masuk -->
        <div class="hidden md:flex">
            <a href="/login"
                class="px-5 py-2 border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 shadow-sm text-base">
                Masuk
            </a>
        </div>

        <!-- Tombol Menu Mobile -->
        <button id="menu-toggle" class="md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-7 w-7 text-gray-700 hover:text-blue-600 transition"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Fullscreen Sidebar (Putih Solid) -->
    <nav id="mobile-menu"
        class="fixed top-0 right-0 h-full w-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50 flex flex-col py-10 px-8">
        <!-- Tombol Tutup -->
        <button id="close-menu" class="absolute top-6 right-6 text-gray-700 hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Menu Item -->
        <div class="flex flex-col items-center justify-center space-y-6 h-full text-lg font-medium">
            <a href="/" class="text-gray-800 hover:text-blue-600 transition">Beranda</a>
            <a href="/artikel" class="text-gray-800 hover:text-blue-600 transition">Artikel</a>
            <a href="/tentang" class="text-gray-800 hover:text-blue-600 transition">Tentang</a>
            <a href="/kontak" class="text-gray-800 hover:text-blue-600 transition">Kontak</a>
            <a href="/login"
                class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md font-semibold">
                Masuk
            </a>
        </div>
    </nav>

    <!-- Script -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenu = document.getElementById('close-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });
    </script>
</header>