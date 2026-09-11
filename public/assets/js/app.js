// ===================== Alley's Laundry — front-end interactions =====================
document.addEventListener('DOMContentLoaded', function () {
  lucide.createIcons();

  // --- Scroll reveal ---
  var revealEls = document.querySelectorAll('[data-reveal]');
  if ('IntersectionObserver' in window) {
    var revealIo = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var delay = el.dataset.revealDelay || '0';
          setTimeout(function () {
            el.classList.remove('opacity-0', 'translate-y-10');
          }, parseInt(delay));
          revealIo.unobserve(el);
        }
      });
    }, { threshold: 0.12 });
    revealEls.forEach(function (el) {
      el.classList.add('opacity-0', 'translate-y-10', 'transition-[opacity,transform]', 'duration-700', 'ease-out');
      revealIo.observe(el);
    });
  }

  const navbar = document.getElementById('navbar');
  const navLinks = document.querySelectorAll('.nav-link');
  const signinBtn = document.getElementById('signin-btn');
  const menuBtn = document.getElementById('mobile-menu-btn');

  function updateNav() {
    if (window.scrollY > 40) {
      navbar.classList.add('bg-white', 'shadow-md');
      navbar.classList.remove('bg-transparent');
      navLinks.forEach(l => { l.classList.remove('text-white'); l.classList.add('text-slate-700'); });
      signinBtn.classList.remove('border-white/60', 'text-white', 'hover:bg-white/10'); signinBtn.classList.add('border-slate-300', 'text-slate-700', 'hover:bg-slate-100');
      menuBtn.classList.remove('text-white'); menuBtn.classList.add('text-slate-900');
    } else {
      navbar.classList.remove('bg-white', 'shadow-md');
      navbar.classList.add('bg-transparent');
      navLinks.forEach(l => { l.classList.add('text-white'); l.classList.remove('text-slate-700'); });
      signinBtn.classList.add('border-white/60', 'text-white', 'hover:bg-white/10'); signinBtn.classList.remove('border-slate-300', 'text-slate-700', 'hover:bg-slate-100');
      menuBtn.classList.add('text-white'); menuBtn.classList.remove('text-slate-900');
    }
  }
  window.addEventListener('scroll', updateNav);
  updateNav();

  // --- Mobile menu toggle ---
  const mobileMenu = document.getElementById('mobile-menu');
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
  mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => mobileMenu.classList.add('hidden')));

  // --- Testimonial scroll buttons ---
  const track = document.getElementById('testi-track');
  const nextBtn = document.getElementById('testi-next');
  const prevBtn = document.getElementById('testi-prev');
  if (track && nextBtn && prevBtn) {
    nextBtn.addEventListener('click', () => track.scrollBy({ left: 360, behavior: 'smooth' }));
    prevBtn.addEventListener('click', () => track.scrollBy({ left: -360, behavior: 'smooth' }));
  }

  // --- Scroll to top button ---
  const scrollTopBtn = document.getElementById('scroll-top');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 500) {
      scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
    } else {
      scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
    }
  });
  scrollTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
});
