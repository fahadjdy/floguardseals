@extends('layouts.base')

@section('title', 'Home | '.$profile->name)

@section('content')


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
                    <p>With years of experience in the industry, Floguard Seals has established itself as a leading
                        provider of high-quality sealing solutions. We specialize in mechanical shaft seals, bearing &
                        lining, and various industrial sealing products.</p>
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



    <!-- Quick Action Section -->
    <x-quick-action />
    
    <!-- Contact Section -->
    <x-contact-form />

@endsection