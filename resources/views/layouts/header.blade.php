<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-content">
            <div class="contact-info">
                <span><i class="fas fa-phone"></i> +91 {{ $profile->contact }}</span>
                <span><i class="fas fa-envelope"></i> {{ $profile->email }}</span>
            </div>
            <div class="slogan">
                "{{ $profile->slogan }}"
            </div>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <div class="nav-content">
            <div class="logo">
                {{-- <h2>Floguard Seals</h2> --}}
                <a href="{{ url('/') }}">
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->name }}">
                </a>
            </div>
            <ul class="nav-menu">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/products') }}">Products</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</nav>
