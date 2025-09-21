<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Floguard Seals</h3>
                <p>Leading provider of professional sealing solutions for industrial applications worldwide.
                    Quality, reliability, and excellence in every product.</p>
                <div class="social-links">
                    {{-- <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a> --}}
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Latest Products</h3>
                <ul>
                     @foreach ($categories as $key => $category)
                        <li>
                            <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                        @if ($key == 3) @break  @endif
                @endforeach
                </ul>
            </div>
            <div class="footer-column">
                <h3>Subscribe</h3>
                <p>Stay updated with our latest products and offers</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address">
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Floguard Seals. All rights reserved.  | Developed by : <a target="_blank" href="https://fahad-jadiya.com/" class="text-white">Fahad Jadiya</a></p>
        </div>
    </div>
</footer>
