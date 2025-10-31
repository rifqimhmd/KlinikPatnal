<header id="main-header" class="bg-white text-gray-800 shadow-md sticky top-0 z-50 transition-transform duration-500">
    <div class="container mx-auto flex justify-between items-center px-4 py-2.5 md:px-6 md:py-4">

        <!-- Tombol Menu Mobile -->
        <button id="menu-toggle" class="md:hidden focus:outline-none mr-3">
            <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 hover:text-blue-600 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/Logo.PNG') }}" alt="Klinik Patnal" class="h-10 md:h-12 w-auto drop-shadow-sm">
        </div>

        <!-- Navigasi Desktop -->
        <nav class="hidden md:flex space-x-8 font-medium text-base relative items-center">
            <a href="/" class="text-gray-700 hover:text-blue-600 transition py-2">Beranda</a>

            <!-- Dropdown Produk -->
            <div class="relative">
                <button id="produk-btn" class="flex items-center space-x-1 text-gray-700 hover:text-blue-600 transition py-2 focus:outline-none">
                    <span>Produk</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="produk-menu" class="absolute left-0 mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible transform translate-y-2 transition-all duration-300 ease-out">
                    <a href="/konsultasi" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-t-lg">Konsultasi</a>
                    <a href="/pelaporan" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-b-lg">Pelaporan</a>
                </div>
            </div>

            <a href="/psikolog" class="text-gray-700 hover:text-blue-600 transition py-2">List Psikolog</a>

            <!-- Dropdown Konten -->
            <div class="relative">
                <button id="konten-btn" class="flex items-center space-x-1 text-gray-700 hover:text-blue-600 transition py-2 focus:outline-none">
                    <span>Konten</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="konten-menu" class="absolute left-0 mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible transform translate-y-2 transition-all duration-300 ease-out">
                    <a href="#artikel" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-t-lg">Artikel</a>
                    <a href="#video-edukasi" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded-b-lg">Video Edukasi</a>
                </div>
            </div>

            <a href="/tentang" class="text-gray-700 hover:text-blue-600 transition py-2">Tentang Kami</a>
        </nav>

        <!-- Tombol Masuk Desktop -->
        <div class="hidden md:flex">
            <a href="/login" class="px-5 py-2 border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200 shadow-sm text-base">
                Masuk
            </a>
        </div>
    </div>

    <!-- MOBILE SLIDE MENU -->
    <div id="mobile-dropdown"
        class="fixed top-0 left-0 w-72 h-full bg-white border-r border-gray-200 transform -translate-x-full transition-transform duration-500 ease-in-out md:hidden z-40 overflow-y-auto shadow-lg">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
            <span class="font-semibold text-lg text-gray-800">Menu</span>
        </div>

        <a href="/" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Beranda</a>

        <!-- Produk -->
        <button id="mobile-produk-btn" class="w-full text-left px-6 py-3 text-gray-700 hover:bg-blue-50 flex justify-between items-center">
            <span>Produk</span>
            <svg id="mobile-produk-arrow" class="w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="mobile-produk-menu" class="hidden flex-col bg-gray-50">
            <a href="/konsultasi" class="block px-10 py-2 text-gray-700 hover:bg-blue-100">Konsultasi</a>
            <a href="/pelaporan" class="block px-10 py-2 text-gray-700 hover:bg-blue-100">Pelaporan</a>
        </div>

        <a href="/psikolog" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">List Psikolog</a>

        <!-- Konten -->
        <button id="mobile-konten-btn" class="w-full text-left px-6 py-3 text-gray-700 hover:bg-blue-50 flex justify-between items-center">
            <span>Konten</span>
            <svg id="mobile-konten-arrow" class="w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div id="mobile-konten-menu" class="hidden flex-col bg-gray-50">
            <a href="#artikel" class="block px-10 py-2 text-gray-700 hover:bg-blue-100">Artikel</a>
            <a href="#video-edukasi" class="block px-10 py-2 text-gray-700 hover:bg-blue-100">Video Edukasi</a>
        </div>

        <a href="/tentang" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Tentang Kami</a>

        <!-- Tombol Masuk Mobile -->
        <div class="px-6 py-4">
            <a href="/login" class="block w-full text-center bg-blue-600 text-white font-semibold py-2.5 rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-md">
                Masuk
            </a>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-30"></div>

    <script>
        // --- Dropdown Desktop ---
        const produkBtn = document.getElementById('produk-btn');
        const kontenBtn = document.getElementById('konten-btn');
        const produkMenu = document.getElementById('produk-menu');
        const kontenMenu = document.getElementById('konten-menu');

        function closeDropdowns() {
            produkMenu.classList.add('opacity-0', 'invisible', 'translate-y-2');
            kontenMenu.classList.add('opacity-0', 'invisible', 'translate-y-2');
        }

        produkBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const open = produkMenu.classList.contains('invisible');
            closeDropdowns();
            if (open) produkMenu.classList.remove('opacity-0', 'invisible', 'translate-y-2');
        });

        kontenBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const open = kontenMenu.classList.contains('invisible');
            closeDropdowns();
            if (open) kontenMenu.classList.remove('opacity-0', 'invisible', 'translate-y-2');
        });

        document.addEventListener('click', closeDropdowns);

        // --- Mobile Slide Menu (toggle hamburger) ---
        const menuToggle = document.getElementById('menu-toggle');
        const mobileDropdown = document.getElementById('mobile-dropdown');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            mobileDropdown.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            mobileDropdown.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // --- Mobile Submenu ---
        const mobileProdukBtn = document.getElementById('mobile-produk-btn');
        const mobileProdukMenu = document.getElementById('mobile-produk-menu');
        const mobileProdukArrow = document.getElementById('mobile-produk-arrow');

        const mobileKontenBtn = document.getElementById('mobile-konten-btn');
        const mobileKontenMenu = document.getElementById('mobile-konten-menu');
        const mobileKontenArrow = document.getElementById('mobile-konten-arrow');

        mobileProdukBtn.addEventListener('click', () => {
            mobileProdukMenu.classList.toggle('hidden');
            mobileKontenMenu.classList.add('hidden');
            mobileProdukArrow.classList.toggle('rotate-180');
            mobileKontenArrow.classList.remove('rotate-180');
        });

        mobileKontenBtn.addEventListener('click', () => {
            mobileKontenMenu.classList.toggle('hidden');
            mobileProdukMenu.classList.add('hidden');
            mobileKontenArrow.classList.toggle('rotate-180');
            mobileProdukArrow.classList.remove('rotate-180');
        });

        // === Efek Header Hilang Saat Scroll ===
        let lastScroll = 0;
        const header = document.getElementById('main-header');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > lastScroll && currentScroll > 80) {
                header.classList.add('-translate-y-full');
            } else {
                header.classList.remove('-translate-y-full');
            }
            lastScroll = currentScroll;
        });
    </script>
</header>