<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Floguard Seals - Professional Sealing Solutions')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- For SEO  --}}
    <meta name="description" content="@yield('meta_description', 'Leading manufacturer of auto rikshaw body parts at best prices. High-quality, durable, and trusted by customers.')">
    <meta name="keywords" content="@yield('meta_keywords', 'rikshaw parts, auto rikshaw body parts, HMH Motors, spare parts')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="@yield('title', 'HMH Motors Industry')" />
    <meta property="og:description" content="@yield('meta_description', 'Premium Rikshaw Body Parts Manufacturer')" />
    <meta property="og:image" content="@yield('meta_image', isset($profile->logo) ? asset('storage/' . $profile->logo) : null)" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <link rel="icon" href="{{ asset('storage/' . $profile->favicon)  }}" type="image/x-icon">
    

    {{-- testimonial --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

</head>
<body>
    
    {{-- Header --}}
    @include('layouts.header')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
