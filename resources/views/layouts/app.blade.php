<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Patnal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    {{-- Header --}}
    @include('components.header')

    {{-- Main Content --}}
    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>

</html>