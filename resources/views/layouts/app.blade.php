<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Klinik Patnal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" text-gray-900 ">

    {{-- Header --}}
    @include('components.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>

</html>