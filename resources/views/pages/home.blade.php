@extends('layouts.app')

@section('title', 'Klinik Patnal - Konsultasi Mudah, Laporan Cepat')

@section('content')
<section class="relative w-full overflow-hidden">
    <!-- === Banner Wrapper === -->
    <div
        id="banner-slider"
        class="flex transition-transform ease-in-out duration-[1000ms] md:gap-8 md:px-8 md:pt-8">

        <!-- Clone terakhir di depan -->
        <img src="{{ asset('images/banner/3.png') }}" alt="Banner 3 Clone"
            class="banner-slide flex-shrink-0 w-full md:w-1/3 object-contain md:rounded-xl max-h-[260px] md:max-h-[340px]" />

        <!-- Banner Asli -->
        <img src="{{ asset('images/banner/1.png') }}" alt="Banner 1"
            class="banner-slide flex-shrink-0 w-full md:w-1/3 object-contain md:rounded-xl max-h-[260px] md:max-h-[340px]" />
        <img src="{{ asset('images/banner/2.png') }}" alt="Banner 2"
            class="banner-slide flex-shrink-0 w-full md:w-1/3 object-contain md:rounded-xl max-h-[260px] md:max-h-[340px]" />
        <img src="{{ asset('images/banner/3.png') }}" alt="Banner 3"
            class="banner-slide flex-shrink-0 w-full md:w-1/3 object-contain md:rounded-xl max-h-[260px] md:max-h-[340px]" />

        <!-- Clone pertama di akhir -->
        <img src="{{ asset('images/banner/1.png') }}" alt="Banner 1 Clone"
            class="banner-slide flex-shrink-0 w-full md:w-1/3 object-contain md:rounded-xl max-h-[260px] md:max-h-[340px]" />
    </div>

    <!-- Dots -->
    <div class="relative mt-4 flex justify-center space-x-2 z-10">
        <button class="dot size-2 rounded-full bg-blue-600" data-index="1"></button>
        <button class="dot size-2 rounded-full bg-blue-300" data-index="2"></button>
        <button class="dot size-2 rounded-full bg-blue-300" data-index="3"></button>
    </div>

    <script>
        const slider = document.getElementById("banner-slider");
        const slides = document.querySelectorAll(".banner-slide");
        const dots = document.querySelectorAll(".dot");
        const totalSlides = slides.length;

        let index = 1;
        let autoSlide;
        let transitioning = false;

        // === PRELOAD SEMUA GAMBAR (agar tidak ada blank sama sekali) ===
        const allImages = Array.from(slides).map(slide => slide.src);
        let loadedImages = 0;

        function preloadAllImages(callback) {
            allImages.forEach(src => {
                const img = new Image();
                img.src = src;
                img.onload = () => {
                    loadedImages++;
                    if (loadedImages === allImages.length) callback();
                };
            });
        }

        // === Hitung lebar slide termasuk gap ===
        function getSlideWidth() {
            const slide = slides[0];
            const style = window.getComputedStyle(slider);
            const gap = window.innerWidth >= 768 ? parseInt(style.gap) || 0 : 0;
            return slide.offsetWidth + gap;
        }

        function moveToSlide(i, withTransition = true) {
            slider.style.transition = withTransition ? "transform 1s ease-in-out" : "none";
            slider.style.transform = `translateX(-${getSlideWidth() * i}px)`;
        }

        function updateDots() {
            dots.forEach((dot, i) => {
                dot.classList.remove("bg-blue-600", "bg-blue-300");
                dot.classList.add(i + 1 === index ? "bg-blue-600" : "bg-blue-300");
            });
        }

        function nextSlide() {
            if (transitioning) return;
            transitioning = true;
            index++;
            moveToSlide(index, true);
            updateDots();
        }

        function prevSlide() {
            if (transitioning) return;
            transitioning = true;
            index--;
            moveToSlide(index, true);
            updateDots();
        }

        function goToSlide(i) {
            index = i;
            moveToSlide(index, true);
            updateDots();
            resetAutoSlide();
        }

        slider.addEventListener("transitionend", () => {
            transitioning = false;

            if (index >= totalSlides - 1) {
                slider.style.transition = "none";
                index = 1;
                slider.style.transform = `translateX(-${getSlideWidth() * index}px)`;
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        slider.style.transition = "transform 1s ease-in-out";
                    });
                });
            }

            if (index <= 0) {
                slider.style.transition = "none";
                index = totalSlides - 2;
                slider.style.transform = `translateX(-${getSlideWidth() * index}px)`;
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        slider.style.transition = "transform 1s ease-in-out";
                    });
                });
            }

            updateDots();
        });

        dots.forEach(dot => {
            dot.addEventListener("click", () => {
                const i = parseInt(dot.dataset.index);
                goToSlide(i);
            });
        });

        function startAutoSlide() {
            autoSlide = setInterval(nextSlide, 4000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlide);
            startAutoSlide();
        }

        // === Swipe di mobile ===
        let startX = 0;
        let moveX = 0;
        let isSwiping = false;

        slider.addEventListener("touchstart", (e) => {
            startX = e.touches[0].clientX;
            isSwiping = true;
            clearInterval(autoSlide);
        });

        slider.addEventListener("touchmove", (e) => {
            if (!isSwiping) return;
            moveX = e.touches[0].clientX;
        });

        slider.addEventListener("touchend", () => {
            if (!isSwiping) return;
            const diff = moveX - startX;

            if (Math.abs(diff) > 50) {
                if (diff < 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }

            isSwiping = false;
            resetAutoSlide();
        });

        // === Jalankan setelah SEMUA gambar siap ===
        preloadAllImages(() => {
            moveToSlide(index, false);
            updateDots();
            startAutoSlide();
        });

        window.addEventListener("resize", () => {
            moveToSlide(index, false);
        });
    </script>
</section>
<section class="relative w-full overflow-hidden bg-gradient-to-r from-white to-blue-50 mt-4 ">
    <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-10">

        <!-- === Kiri: Teks & Tombol Produk === -->
        <div class="flex-1 text-center md:text-left md:pt-0 pt-8">
            <p class="text-blue-600 font-semibold text-sm md:text-base">
                Temukan Layanan Konseling dan Pelaporan yang Profesional & Terpercaya
            </p>
            <h2 class="text-3xl md:text-5xl font-bold text-blue-600 leading-snug mt-4 md:mt-6">
                Bersama Kami, <br />
                Kamu Tidak Sendiri Lagi
            </h2>

            <p class="text-gray-700 mt-4 mb-10 text-base md:text-lg">
                Pilih layanan yang sesuai dengan kebutuhanmu.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center md:justify-start">
                <!-- Kartu Konsultasi -->
                <a href="/konsultasi"
                    class="group bg-white shadow-md rounded-xl p-5 flex items-center justify-between w-full sm:w-72 
          hover:bg-blue-50 hover:shadow-lg transition-all duration-300">
                    <div class="text-left">
                        <p class="text-gray-500 text-sm">Konsultasi untuk saya</p>
                        <h3 class="text-blue-600 font-semibold text-lg group-hover:text-blue-700">Konsultasi</h3>
                        <div class="text-blue-600 text-sm font-medium flex items-center gap-1 mt-2">
                            Pilih
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                    <img src="{{ asset('images/konsultasi.png') }}" alt="Konsultasi" class="w-16 h-16 object-contain">
                </a>

                <!-- Kartu Pelaporan -->
                <a href="/pelaporan"
                    class="group bg-white shadow-md rounded-xl p-5 flex items-center justify-between w-full sm:w-72 
          hover:bg-blue-50 hover:shadow-lg transition-all duration-300">
                    <div class="text-left">
                        <p class="text-gray-500 text-sm">Pelaporan untuk saya</p>
                        <h3 class="text-blue-600 font-semibold text-lg group-hover:text-blue-700">Pelaporan</h3>
                        <div class="text-blue-600 text-sm font-medium flex items-center gap-1 mt-2">
                            Pilih
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="size-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                    <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan" class="w-16 h-16 object-contain">
                </a>

            </div>
        </div>

        <!-- === Kanan: Gambar Ilustrasi === -->
        <div class="flex-1 flex justify-center md:justify-end md:pt-24">
            <img src="{{ asset('images/produk.png') }}" alt="Produk Klinik Patnal" class="w-80 md:w-[420px] max-w-full object-contain drop-shadow-md">
        </div>
    </div>
</section>
<section id="artikel" class="py-12">
    <div class="container mx-auto px-6 md:px-12">
        <!-- Judul -->
        <div class="mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Artikel</h2>
            <p class="text-gray-600">Informasi terbaru seputar Klinik Patnal dan Pemasyarakatan</p>
        </div>

        <!-- Tabs -->
        <div class="flex space-x-8 border-b border-gray-200 mb-6">
            <button id="tab-terbaru"
                class="tab-button pb-2 font-medium text-blue-600 border-b-2 border-blue-600 focus:outline-none transition">
                Terbaru
            </button>
            <button id="tab-populer"
                class="tab-button pb-2 font-medium text-gray-600 border-b-2 border-transparent hover:text-blue-600 focus:outline-none transition">
                Terpopuler
            </button>
        </div>

        <!-- Konten Tab: Terbaru -->
        <div id="content-terbaru" class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Kegiatan Edukasi di Klinik Patnal</h3>
                    <p class="text-sm text-gray-600">Klinik Patnal mengadakan kegiatan edukasi terkait kesehatan mental bagi warga binaan...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Sosialisasi Layanan Konsultasi Online</h3>
                    <p class="text-sm text-gray-600">Layanan konsultasi online kini dapat diakses melalui platform digital Klinik Patnal...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Pelatihan Deteksi Dini di UPT Pemasyarakatan</h3>
                    <p class="text-sm text-gray-600">Petugas mengikuti pelatihan deteksi dini gangguan keamanan dan ketertiban...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Inovasi Layanan Pelaporan di Klinik Patnal</h3>
                    <p class="text-sm text-gray-600">Klinik Patnal meluncurkan sistem pelaporan berbasis digital untuk memudahkan akses...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Konten Tab: Terpopuler -->
        <div id="content-populer" class="hidden gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel Populer" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Tips Menjaga Kesehatan Mental di Lapas</h3>
                    <p class="text-sm text-gray-600">Edukasi tentang pentingnya menjaga keseimbangan mental bagi warga binaan...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel Populer" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Kegiatan Sosialisasi di Rutan</h3>
                    <p class="text-sm text-gray-600">Petugas Klinik Patnal menyampaikan edukasi kesehatan kepada warga binaan...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel Populer" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Workshop Penanganan Krisis</h3>
                    <p class="text-sm text-gray-600">Pelatihan untuk meningkatkan respon petugas terhadap kondisi darurat di lapas...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('images/banner/1.png') }}" alt="Artikel Populer" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Pelayanan Kesehatan Rutin</h3>
                    <p class="text-sm text-gray-600">Kegiatan pemeriksaan kesehatan rutin bagi narapidana terus ditingkatkan...</p>
                    <a href="#" class="text-blue-600 text-sm font-medium mt-2 inline-block hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Tab -->
    <script>
        const tabTerbaru = document.getElementById('tab-terbaru');
        const tabPopuler = document.getElementById('tab-populer');
        const contentTerbaru = document.getElementById('content-terbaru');
        const contentPopuler = document.getElementById('content-populer');

        function showTerbaru() {
            // aktifkan tab Terbaru
            tabTerbaru.classList.add('text-blue-600', 'border-blue-600');
            tabTerbaru.classList.remove('text-gray-600', 'border-transparent');
            tabPopuler.classList.remove('text-blue-600', 'border-blue-600');
            tabPopuler.classList.add('text-gray-600', 'border-transparent');

            // tampilkan konten Terbaru, sembunyikan Populer
            contentTerbaru.classList.remove('hidden');
            contentTerbaru.classList.add('grid');

            contentPopuler.classList.remove('grid');
            contentPopuler.classList.add('hidden');
        }

        function showPopuler() {
            // aktifkan tab Populer
            tabPopuler.classList.add('text-blue-600', 'border-blue-600');
            tabPopuler.classList.remove('text-gray-600', 'border-transparent');
            tabTerbaru.classList.remove('text-blue-600', 'border-blue-600');
            tabTerbaru.classList.add('text-gray-600', 'border-transparent');

            // tampilkan konten Populer, sembunyikan Terbaru
            contentPopuler.classList.remove('hidden');
            contentPopuler.classList.add('grid');

            contentTerbaru.classList.remove('grid');
            contentTerbaru.classList.add('hidden');
        }

        // Event listener
        tabTerbaru.addEventListener('click', showTerbaru);
        tabPopuler.addEventListener('click', showPopuler);

        // Default: tampilkan Terbaru
        showTerbaru();
    </script>
</section>
<section id="video-edukasi" class="relative w-full bg-gradient-to-r from-blue-50 to-white py-6 md:py-20">
    <div class="container mx-auto px-6 md:px-12">
        <div class="relative w-full max-w-4xl mx-auto aspect-video rounded-2xl overflow-hidden shadow-lg">
            <iframe
                class="w-full h-full"
                src="https://www.youtube.com/embed/jnwOBr7DtKA"
                title="Video Edukasi Klinik Patnal"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

@endsection