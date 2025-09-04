import './bootstrap';

// Enhanced Performance and Animation System
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all systems
    initRevealAnimations();
    initLazyLoading();
    initPerformanceOptimizations();
    initSmoothScrolling();
    initImageOptimizations();
});

// Enhanced Intersection Observer for reveal animations
function initRevealAnimations() {
    const revealObserverOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add reveal animation class
                entry.target.classList.add('reveal-active');
                
                // Add stagger delay for child elements
                const children = entry.target.querySelectorAll('.reveal-child');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('reveal-child-active');
                    }, index * 100);
                });
            }
        });
    }, revealObserverOptions);

    // Observe all elements with reveal classes
    const revealElements = document.querySelectorAll('.reveal-on-scroll');
    revealElements.forEach(el => revealObserver.observe(el));
    
    // Also observe existing animate-on-scroll elements
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    animatedElements.forEach(el => {
        if (!el.classList.contains('reveal-on-scroll')) {
            revealObserver.observe(el);
        }
    });
}

// Enhanced Lazy Loading for Images
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });

        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            img.classList.add('loaded');
        });
    }
}

// Performance Optimizations
function initPerformanceOptimizations() {
    // Debounce scroll events
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(() => {
            // Handle scroll-based animations efficiently
            updateScrollAnimations();
        }, 16); // ~60fps
    });

    // Optimize resize events
    let resizeTimeout;
    window.addEventListener('resize', () => {
        if (resizeTimeout) {
            clearTimeout(resizeTimeout);
        }
        resizeTimeout = setTimeout(() => {
            // Handle resize-based updates
            updateLayoutOnResize();
        }, 250);
    });
}

// Smooth Scrolling Enhancement
function initSmoothScrolling() {
    // Enhanced smooth scrolling for anchor links
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
}

// Image Optimizations
function initImageOptimizations() {
    // Add loading="lazy" to all images that don't have it
    const images = document.querySelectorAll('img:not([loading])');
    images.forEach(img => {
        if (!img.classList.contains('hero-image')) {
            img.loading = 'lazy';
        }
    });

    // Add decoding="async" for better performance
    images.forEach(img => {
        img.decoding = 'async';
    });
}

// Update scroll animations efficiently
function updateScrollAnimations() {
    const scrollY = window.pageYOffset;
    const windowHeight = window.innerHeight;
    
    // Only update visible elements
    const visibleElements = document.querySelectorAll('.reveal-on-scroll:not(.reveal-active)');
    visibleElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < windowHeight * 0.8) {
            el.classList.add('reveal-active');
        }
    });
}

// Update layout on resize
function updateLayoutOnResize() {
    // Handle any layout-specific updates
    const isMobile = window.innerWidth < 768;
    document.body.classList.toggle('mobile-layout', isMobile);
}

// Enhanced Back to Top functionality
function initBackToTop() {
    const backToTop = document.getElementById('back-to-top');
    if (!backToTop) return;

    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        
        scrollTimeout = setTimeout(() => {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        }, 16);
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ 
            top: 0, 
            behavior: 'smooth' 
        });
    });
}

// Initialize back to top when DOM is ready
document.addEventListener('DOMContentLoaded', initBackToTop);

// Export functions for global use
window.NexBuyApp = {
    initRevealAnimations,
    initLazyLoading,
    initPerformanceOptimizations
};
