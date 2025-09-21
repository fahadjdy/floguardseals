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

// hamburger.addEventListener('click', () => {
//   hamburger.classList.toggle('active');
//   navMenu.classList.toggle('active');
// });

// Close mobile menu when clicking on a link
// document.querySelectorAll('.nav-menu a').forEach(link => {
//   link.addEventListener('click', () => {
//     hamburger.classList.remove('active');
//     navMenu.classList.remove('active');
//   });
// });


 document.addEventListener("DOMContentLoaded", function () {
        const currentUrl = window.location.pathname; // current page path
        document.querySelectorAll(".nav-menu a").forEach(link => {
            if (link.getAttribute("href") === this.location.origin + currentUrl) {
                link.classList.add("active");
            }
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
document.querySelectorAll('.feature-card').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(30px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  observer.observe(el);
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


// Add hover effects to cards
document.querySelectorAll('.feature-card').forEach(card => {
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



// Contact form validation

function stripTags(input) {
  let div = document.createElement("div")
  div.innerHTML = input
  return div.textContent || div.innerText || ""
}

// Show error under field
function showError(field, message) {
  let errorEl = field.nextElementSibling
  if (errorEl && errorEl.classList.contains("error")) {
    errorEl.innerText = message
    errorEl.style.display = "block"
  }
  field.classList.add("error-input")
  field.focus()
}

// Clear errors
function clearError(field) {
  let errorEl = field.nextElementSibling
  if (errorEl && errorEl.classList.contains("error")) {
    errorEl.innerText = ""
    errorEl.style.display = "none"
  }
  field.classList.remove("error-input")
}

document.querySelector(".contact-form").addEventListener("submit", function (e) {
  e.preventDefault()

  let form = this
  let nameField = form.querySelector('input[type="text"]')
  let emailField = form.querySelector('input[type="email"]')
  let phoneField = form.querySelector('input[type="tel"]')
  let messageField = form.querySelector("textarea")

  let name = stripTags(nameField.value.trim())
  let email = stripTags(emailField.value.trim())
  let phone = stripTags(phoneField.value.trim())
  let message = stripTags(messageField.value.trim())

  // Clear old errors
  ;[nameField, emailField, phoneField, messageField].forEach(clearError)

  // === Frontend Validation ===
  if (!/^[A-Za-z\s]{1,50}$/.test(name)) {
    showError(nameField, "Name must contain only letters and spaces (max 50 chars).")
    return
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) || email.length > 50) {
    showError(emailField, "Enter a valid email address (max 50 chars).")
    return
  }

  phone = phone.replace(/\D/g, "") // remove non-digits
  phone = phone.replace(/^(91|0)/, "") // remove +91 or 0 at start
  if (!/^\d{10}$/.test(phone)) {
    showError(phoneField, "Phone number must be exactly 10 digits.")
    return
  }

  if (message.length < 1 || message.length > 500) {
    showError(messageField, "Message must be between 1 and 500 characters.")
    return
  }

  // === Submit to backend ===
  let formData = new FormData(form)

  fetch(location.origin + "/inquiry", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    },
    body: formData
  })
    .then(async res => {
      if (!res.ok) {
        // Handle Laravel validation errors (422)
        if (res.status === 422) {
          let errorData = await res.json()
          let errors = errorData.errors

          if (errors.name) showError(nameField, errors.name[0])
          if (errors.email) showError(emailField, errors.email[0])
          if (errors.mobile) showError(phoneField, errors.mobile[0])
          if (errors.description) showError(messageField, errors.description[0])
        } else {
          alert("Something went wrong. Please try again.")
        }
        return
      }

      return res.json()
    })
    .then(data => {
      if (data && data.status === "success") {
        alert(data.message)
        form.reset()
      }
    })
    .catch(err => {
      console.error("Error:", err)
      alert("Server error. Please try again later.")
    })
})


// Handle paste events for phone: strip +91 or 0 automatically
document.querySelector('input[type="tel"]').addEventListener("paste", function (e) {
  e.preventDefault()
  let pasted = (e.clipboardData || window.clipboardData).getData("text")
  pasted = pasted.replace(/\D/g, "")
  pasted = pasted.replace(/^(91|0)/, "")
  this.value = pasted
})