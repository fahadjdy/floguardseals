@extends('layouts.base')

@section('title', 'Home | '.$profile->name)

@section('content')

    {{-- Hero Section --}}
    <section id="home" class="hero">
        <div class="hero-bg">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">Professional Sealing Solutions</h1>
                    <p class="hero-subtitle">Leading provider of mechanical shaft seals, bearing & lining, and premium
                        sealing products for industrial applications worldwide.</p>
                    <div class="hero-buttons">
                        <a href="{{ url('/products')}}" class="btn btn-primary">Explore Products</a>
                        <a href="#contact" class="btn btn-secondary">Get Quote</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/floguard-family.png') }}"
                        alt="Industrial Seals">
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>About {{ $profile->name ?? 'FloGuard Seals'}}</h2>
                <p>Your trusted partner in sealing solutions</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h3>Excellence in Sealing Technology</h3>
                    <p>{{ $profile->about }}</p>
                    <div class="about-features">
                        <div class="feature">
                            <i class="fas fa-award"></i>
                            <span>Premium Quality Products</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Fast Delivery</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <div class="floating-icon icon-1"><i class="fas fa-cog"></i></div>
                    <div class="floating-icon icon-2"><i class="fas fa-tools"></i></div>
                    <img src="{{  asset('img/floguard-about.png') }}"
                        alt="About Us">
                </div>
            </div>
        </div>
    </section>



    <section id="why-choose" class="section why-choose-us">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Why Choose {{ $profile->name ?? 'FloGuard Seals'}} ?</h2>
                <p>Discover what makes us the industry leader</p>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-in visible">
                    <div class="feature-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>We source and supply only the highest quality sealing products that meet international standards
                        and exceed customer expectations.</p>
                </div>
                <div class="feature-card fade-in visible" style="transform: translateY(0px) scale(1);">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3>Fast Delivery</h3>
                    <p>Quick turnaround times and efficient logistics ensure your products reach you when you need them
                        most.</p>
                </div>
                <div class="feature-card fade-in visible">
                    <div class="feature-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Technical Expertise</h3>
                    <p>Our team of technical experts provides comprehensive support and guidance for all your sealing
                        requirements.</p>
                </div>
                <div class="feature-card fade-in visible">
                    <div class="feature-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h3>Competitive Pricing</h3>
                    <p>Best-in-class pricing without compromising on quality, ensuring maximum value for your
                        investment.</p>
                </div>
                <div class="feature-card fade-in visible">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Global Reach</h3>
                    <p>Serving clients worldwide with our extensive network and international shipping capabilities.</p>
                </div>
                <div class="feature-card fade-in visible">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock customer support to address your queries and provide assistance whenever needed.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse by Category Section -->
    <section id="categories" class="categories">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Browse by Category</h2>
                <p>Explore our wide range of sealing solutions</p>
            </div>

            <div class="categories-grid">

                  @foreach ($categories as $category)
                <a href="{{ route('category', $category->slug) }}">
                         <div class="category-card">
                            <img laoding="lazy" src="{{ asset('storage/' . $category->primary_image) }}" alt="{{ $category->name }}">
                            <h3>{{ $category->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Featured Products</h2>
                <p>Discover our premium range of industrial sealing products</p>
            </div>

            <div class="products-grid">

                <!-- Product Card -->

                    @foreach ($products as $key => $product)
                            <div class="product-card">
                                    <img src="{{ asset('storage/' . $product->primary_image) }}" alt="Mechanical Shaft Seal">
                                    <div class="product-content">
                                        <h3>{{ $product->name }}</h3>
                                        <p>{{ $product->category->name }}</p>
                                        <button>
                                            <a href="https://wa.me/{{ $profile->contact }}?text=I'm%20interested%20in%20the%20product:%20{{ urlencode($product->name) }}" target="_blank" rel="noopener noreferrer">
                                                Inquiry Now
                                            </a>
                                        </button>
                                    </div>
                                </div>

                                 @if ($key == 3) @break  @endif
                    @endforeach

            </div>

            <div class="view-all">
                <button>
                        <a href="{{ route('products') }}"> 
                            View All Products →
                        </a>
                </button> 
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Our Process</h2>
                <p>How we deliver excellence</p>
            </div>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Consultation</h3>
                    <p>We understand your specific requirements</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Selection</h3>
                    <p>Choose the right products for your application</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Delivery</h3>
                    <p>Fast and secure delivery to your location</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3>Support</h3>
                    <p>Ongoing support and maintenance services</p>
                </div>
            </div>
        </div>
    </section>

    </section>

    <!-- Quick Action Section -->
    <x-quick-action />
    
    <!-- Contact Section -->
    <x-contact-form />

   <!-- Testimonial Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>What Our Clients Say</h2>
                <p>Trusted by industries worldwide for reliable sealing solutions</p>
            </div>

            <!-- Swiper -->
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="testimonial-text">
                                    <p>{{ $testimonial->content }}</p>
                                </div>
                                <div class="testimonial-author">
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                    <div>
                                        <h4>{{ $testimonial->name }}</h4>
                                        <span>{{ $testimonial->designation ?? 'Client' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation -->
                <div class="swiper-button-next">
                    <i class="fa-solid fa-chevron-right fs-4"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="fa-solid fa-chevron-left fs-4"></i>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.testimonial-swiper', {
        loop: true,
        spaceBetween: 30,
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        breakpoints: {
        0: { slidesPerView: 1, spaceBetween: 20 },   // mobile
        768: { slidesPerView: 2, spaceBetween: 25 },  // tablet
        1024: { slidesPerView: 3, spaceBetween: 30 }, // desktop
        }
    });
    </script>

@endsection
