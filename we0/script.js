// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Mobile menu toggle
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  navMenu.classList.toggle('active');
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-menu a').forEach(link => {
  link.addEventListener('click', () => {
    hamburger.classList.remove('active');
    navMenu.classList.remove('active');
  });
});

// Navbar background change on scroll
window.addEventListener('scroll', () => {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 100) {
    navbar.style.background = 'rgba(255, 255, 255, 0.95)';
    navbar.style.backdropFilter = 'blur(10px)';
  } else {
    navbar.style.background = 'white';
    navbar.style.backdropFilter = 'none';
  }
});

// Intersection Observer for animations
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
    }
  });
}, observerOptions);

// Observe elements for animation
document.querySelectorAll('.feature-card, .category-card, .product-card, .service-card, .testimonial-card, .process-step').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(30px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  observer.observe(el);
});

// Contact form submission
document.querySelector('.contact-form').addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Get form data
  const formData = new FormData(this);
  const name = this.querySelector('input[type="text"]').value;
  const email = this.querySelector('input[type="email"]').value;
  const subject = this.querySelector('input[placeholder="Subject"]').value;
  const message = this.querySelector('textarea').value;
  
  // Simple validation
  if (!name || !email || !subject || !message) {
    alert('Please fill in all fields');
    return;
  }
  
  // Simulate form submission
  alert('Thank you for your message! We will get back to you soon.');
  this.reset();
});

// Newsletter subscription
document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const email = this.querySelector('input[type="email"]').value;
  
  if (!email) {
    alert('Please enter your email address');
    return;
  }
  
  alert('Thank you for subscribing to our newsletter!');
  this.reset();
});

// Download brochure functionality
document.getElementById('downloadBrochure').addEventListener('click', function(e) {
  e.preventDefault();
  
  // Create a simple text file as a demo brochure
  const brochureContent = `
FLOGUARD SEALS - COMPANY BROCHURE

About Us:
Floguard Seals is a leading provider of professional sealing solutions for industrial applications worldwide.

Our Products:
- Mechanical Shaft Seals
- Bearing & Lining
- Casing & Wear Rings
- Silicon & Tungsten Carbide Products

Contact Information:
Phone: +1 (555) 123-4567
Email: info@floguardseals.com
Website: www.floguardseals.com

"Sealing Excellence, Delivering Trust"
  `;
  
  const blob = new Blob([brochureContent], { type: 'text/plain' });
  const url = window.URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'Floguard-Seals-Brochure.txt';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  window.URL.revokeObjectURL(url);
});

// Add hover effects to cards
document.querySelectorAll('.feature-card, .category-card, .product-card').forEach(card => {
  card.addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-10px) scale(1.02)';
  });
  
  card.addEventListener('mouseleave', function() {
    this.style.transform = 'translateY(0) scale(1)';
  });
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  const parallax = document.querySelector('.hero-bg');
  const speed = scrolled * 0.5;
  
  if (parallax) {
    parallax.style.transform = `translateY(${speed}px)`;
  }
});

// Counter animation for statistics (if needed)
function animateCounter(element, target, duration = 2000) {
  let start = 0;
  const increment = target / (duration / 16);
  
  const timer = setInterval(() => {
    start += increment;
    element.textContent = Math.floor(start);
    
    if (start >= target) {
      element.textContent = target;
      clearInterval(timer);
    }
  }, 16);
}

// Initialize animations when page loads
document.addEventListener('DOMContentLoaded', function() {
  // Add loading animation
  document.body.style.opacity = '0';
  setTimeout(() => {
    document.body.style.transition = 'opacity 0.5s ease';
    document.body.style.opacity = '1';
  }, 100);
  
  // Initialize floating animations
  const floatingElements = document.querySelectorAll('.floating-shape, .floating-icon');
  floatingElements.forEach((element, index) => {
    element.style.animationDelay = `${index * 0.5}s`;
  });
});

// Add scroll-to-top functionality
const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
};

// Show/hide scroll to top button
window.addEventListener('scroll', () => {
  const scrollButton = document.querySelector('.scroll-to-top');
  if (window.pageYOffset > 300) {
    if (scrollButton) {
      scrollButton.style.display = 'block';
    }
  } else {
    if (scrollButton) {
      scrollButton.style.display = 'none';
    }
  }
});