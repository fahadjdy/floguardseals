@extends('layouts.base')

@section('title', $profile->name .' - Home')

@section('content')


  <!-- Browse by Category Section -->
    <section id="categories" class="categories">
        <div class="container">
             @if ($products->isEmpty())
                    <p>No products found in  {{ $category->name }}</p>                    
                @else
                    <div class="section-title fade-in visible">
                        <h2>Products of {{ $category->name }}</h2>
                    </div>

                    <div class="categories-grid">

                    
                        @foreach ($products as $product)
                                <div class="product-card">
                                    <img loading="lazy" src="{{ asset('storage/' . $product->primary_image) }}" alt="Mechanical Shaft Seal">
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
