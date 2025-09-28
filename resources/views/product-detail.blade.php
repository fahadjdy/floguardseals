@extends('layouts.base')

@section('title', 'Home | '.$profile->name)

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 mt-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-yellow-600 transition duration-300">Home</a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <a href="{{ url('/products') }}" class="text-gray-600 hover:text-yellow-600 transition duration-300">Products</a>
                <i class="fas fa-chevron-right text-gray-400"></i>
                <span class="text-yellow-600 font-semibold">Premium Mechanical Shaft Seal</span>
            </nav>
        </div>
    </div>

   <!-- Product Detail Section -->
    <section class="product-section">
        <div class="container">
            <div class="product-grid">
            <!-- Product Images -->
            <div class="product-images">
                <div class="product-image-container main-image">
                <img src="{{ asset('storage/'.$productDetail->primary_image) }}" alt="Premium Mechanical Shaft Seal" class="product-image">
                </div>
            </div>

            <!-- Product Information -->
            <div class="product-info">
                <h1 class="product-title">{{ $productDetail->name }}</h1>
                <div class="product-tags">
                <span class="tag tag-best">Best Seller</span>
                <span class="tag tag-stock">In Stock</span>
                </div>
                <p class="product-description">
                    {!! nl2br($productDetail->description) !!}
                </p>


                <!-- Pricing and Actions -->
                <div class="pricing">
                <div class="price-header">
                    <div>
                    <span class="price">Contact for Price</span>
                    <p class="discount-note">Bulk discounts available</p>
                    </div>
                </div>
                <div class="actions">
                   <a href="tel:{{ $profile->contact }}" class="btn btn-primary">
                        <i class="fa fa-phone"></i>
                        Request Quote</a>
                    <button class="btn btn-outline">
                        <i class="fa fa-download"></i>
                         Download Brochure</button>
                </div>
                <div class="delivery-note">
                    <i class="fa fa-truck mx-5"></i>
                     Fast delivery available • Technical support included
                </div>
                </div>

                <!-- Quick Contact -->
                <div class="contact-box">
                <h4>Need Technical Assistance?</h4>
                <div class="contact-row">
                    <div>
                    <p>Speak with our seal specialists</p>
                    <p class="phone">+91 {{ $profile->contact ?? '' }}</p>
                    </div>
                    <a href="tel:{{ $profile->contact }}" class="btn btn-dark">Call Now</a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Quick Action Section -->
    <x-quick-action />

    <!-- Contact Section -->
    <x-contact-form />

@endsection