/**
 * syrian_fashion - Main JavaScript
 */
(function () {
    'use strict';

    const SITE_URL = window.location.origin + '/syrian_fashion';

    // ── Mobile Menu ──
    const menuToggle = document.getElementById('menuToggle');
    const mainNav    = document.getElementById('mainNav');
    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('open');
            menuToggle.classList.toggle('active');
        });
    }

    // ── Search Overlay ──
    const searchToggle  = document.getElementById('searchToggle');
    const searchOverlay = document.getElementById('searchOverlay');
    if (searchToggle && searchOverlay) {
        searchToggle.addEventListener('click', () => {
            searchOverlay.classList.toggle('open');
            const input = searchOverlay.querySelector('input');
            if (input && searchOverlay.classList.contains('open')) {
                setTimeout(() => input.focus(), 150);
            }
        });
    }

    // ── Sticky Header ──
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        if (header) {
            header.classList.toggle('scrolled', currentScroll > 50);
        }
    }, { passive: true });

    // ── Back to Top ──
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            backToTop.classList.toggle('visible', window.pageYOffset > 400);
        }, { passive: true });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ── Add to Cart (AJAX) ──
    window.addToCart = function (productId, btn) {
        const originalHTML = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';

        fetch(SITE_URL + '/cart_action.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'action=add&id=' + productId + '&qty=1'
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                btn.innerHTML = '<i class="fa-solid fa-check"></i>';
                updateCartCount(data.count);
                showToast(data.message || 'تمت الإضافة إلى السلة بنجاح');
            } else {
                btn.innerHTML = originalHTML;
                showToast(data.message || 'حدث خطأ', 'error');
            }
            setTimeout(() => { btn.innerHTML = originalHTML; btn.disabled = false; }, 1500);
        })
        .catch(() => {
            btn.innerHTML = originalHTML;
            btn.disabled = false;
            showToast('فشل الاتصال بالخادم', 'error');
        });
    };

    // ── Update Cart Count ──
    function updateCartCount(count) {
        const cartBtn = document.querySelector('.cart-btn');
        if (!cartBtn) return;
        let badge = cartBtn.querySelector('.cart-count');
        if (!badge) {
            badge = document.createElement('span');
            badge.className = 'cart-count';
            cartBtn.appendChild(badge);
        }
        badge.textContent = count;
        badge.style.display = count > 0 ? 'flex' : 'none';
    }

    // ── Toast ──
    function showToast(message, type = 'success') {
        let toast = document.getElementById('appToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'appToast';
            toast.className = 'toast';
            document.body.appendChild(toast);
        }
        toast.textContent = message;
        toast.className = 'toast toast-' + type + ' show';
        clearTimeout(toast._timer);
        toast._timer = setTimeout(() => toast.classList.remove('show'), 3000);
    }

    // ── Scroll Reveal ──
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.section-header, .category-card, .product-card, .testimonial-card, .about-grid > *')
            .forEach(el => { el.classList.add('reveal'); observer.observe(el); });
    }

})();