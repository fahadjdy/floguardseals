@extends('layouts.base')

@section('title', 'Home | '.$profile->name)

@section('content')
    
 <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <div class="section-title fade-in visible">
                <h2>Our Products</h2>
                <p>Discover our premium range of industrial sealing products</p>
            </div>
            @if (count($products) == 0)
                <p class="text-center">No products found</p>
            @else
                <div class="products-grid">

                    <!-- Product Card -->
                        @foreach ($products as $product)
                                <div class="product-card">
                                    <a href="{{ url('/product-detail/' . $product->slug) }}">

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
                                        </a>
                                    </div>
                        @endforeach

                </div>
            @endif
        </div>
    </section>


    <!-- Quick Action Section -->
    <x-quick-action />

    <!-- Contact Section -->
    <x-contact-form />

@endsection