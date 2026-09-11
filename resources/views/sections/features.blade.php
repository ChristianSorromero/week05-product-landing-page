{{-- ===================== FEATURES SECTION ===================== --}}
<section id="features" class="relative overflow-hidden bg-slate-50 py-20 md:py-28">

  {{-- faint decorative backdrop, purely ambient — respects reduced motion via CSS below --}}
  <div class="pointer-events-none absolute -top-24 right-0 h-96 w-96 rounded-full bg-primary-100/40 blur-3xl"></div>

  <div class="container relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div class="mx-auto mb-16 max-w-2xl text-center">
      <h2 id="why-alleys-heading" class="font-heading text-5xl font-extrabold text-slate-900 md:text-6xl">
        Why <span class="text-cyan-500">Alley's</span>
      </h2>
      <p class="mt-5 text-lg text-slate-500">From pickup to fold, every step is handled by people who genuinely care about your clothes.</p>
    </div>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @foreach (($features ?? [
          [
            'icon' => 'truck',
            'iconBg' => 'bg-primary-50',
            'iconColor' => 'text-primary-600',
            'title' => 'Free Pickup & Delivery',
            'description' => 'Book a slot and we come to you — no drop-off, no queueing, no hassle.',
            'detail' => 'Usually within 24 hours',
          ],
          [
            'icon' => 'map-pin',
            'iconBg' => 'bg-secondary-50',
            'iconColor' => 'text-secondary-600',
            'title' => 'Real-Time Order Tracking',
            'description' => 'Follow every load from pickup to wash, dry, fold, and delivery, live.',
            'detail' => 'SMS + app status updates',
          ],
          [
            'icon' => 'leaf',
            'iconBg' => 'bg-emerald-50',
            'iconColor' => 'text-emerald-600',
            'title' => 'Eco-Friendly Detergents',
            'description' => 'Gentle, hypoallergenic formulas that are tough on stains, kind to skin.',
            'detail' => 'Safe for sensitive skin',
          ],
          [
            'icon' => 'shirt',
            'iconBg' => 'bg-amber-50',
            'iconColor' => 'text-amber-600',
            'title' => 'Expert Fabric Care',
            'description' => 'Delicates, linens, and everyday wear are sorted and treated by trained hands.',
            'detail' => 'Sorted by fabric type',
          ],
          [
            'icon' => 'receipt',
            'iconBg' => 'bg-rose-50',
            'iconColor' => 'text-rose-600',
            'title' => 'Transparent Pricing',
            'description' => 'Pay per load or per kilo — no hidden fees, no surprise add-ons.',
            'detail' => 'See our rates',
          ],
          [
            'icon' => 'smile',
            'iconBg' => 'bg-sky-50',
            'iconColor' => 'text-sky-600',
            'title' => 'Friendly, Attentive Staff',
            'description' => 'Every order is handled by trained attendants who treat your clothes like their own.',
            'detail' => 'Say hi at your nearest branch',
          ],
      ]) as $feature)
        <x-feature-card :feature="$feature" />
      @endforeach
    </div>

    <div class="mt-14 text-center">
      <a
        id="explore-features-cta"
        href="#pricing"
        class="group relative inline-flex items-center gap-2 overflow-hidden rounded-xl bg-slate-900 px-6 py-3 font-semibold text-white transition-colors hover:bg-slate-800"
      >
        <span class="relative z-10">Explore all features</span>
        <i data-lucide="arrow-right" class="relative z-10 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"></i>
        <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-primary-600 to-secondary-500 transition-transform duration-500 ease-out group-hover:translate-x-0"></span>
      </a>
    </div>
  </div>
</section>

@once
@push('scripts')
<script>
  (function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ---- staggered scroll reveal ----
    var cards = document.querySelectorAll('[data-feature-card]');
    var heading = document.getElementById('why-alleys-heading');
    var highlightBar = heading ? heading.querySelector('[data-highlight-bar]') : null;

    if (reduceMotion) {
      cards.forEach(function (c) { c.classList.remove('opacity-0', 'translate-y-6'); });
      if (highlightBar) highlightBar.classList.remove('scale-x-0');
    } else if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry, i) {
          if (entry.isIntersecting) {
            var el = entry.target;
            var index = Array.prototype.indexOf.call(cards, el);
            setTimeout(function () {
              el.classList.remove('opacity-0', 'translate-y-6');
            }, (index % 3) * 90);
            io.unobserve(el);
          }
        });
      }, { threshold: 0.15 });
      cards.forEach(function (c) { io.observe(c); });

      if (highlightBar) {
        var headingIo = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              setTimeout(function () { highlightBar.classList.remove('scale-x-0'); }, 150);
              headingIo.unobserve(entry.target);
            }
          });
        }, { threshold: 0.5 });
        headingIo.observe(heading);
      }
    } else {
      cards.forEach(function (c) { c.classList.remove('opacity-0', 'translate-y-6'); });
      if (highlightBar) highlightBar.classList.remove('scale-x-0');
    }

    // ---- cursor-tracking spotlight + tilt ----
    if (!reduceMotion) {
      cards.forEach(function (card) {
        card.addEventListener('mousemove', function (e) {
          var rect = card.getBoundingClientRect();
          var x = e.clientX - rect.left;
          var y = e.clientY - rect.top;
          card.style.setProperty('--x', x + 'px');
          card.style.setProperty('--y', y + 'px');

          var midX = rect.width / 2;
          var midY = rect.height / 2;
          var rotateY = ((x - midX) / midX) * 4; // max ~4deg
          var rotateX = ((midY - y) / midY) * 4;
          card.style.transform = 'perspective(800px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateY(-4px)';
        });

        card.addEventListener('mouseleave', function () {
          card.style.transform = '';
        });
      });

      // ---- magnetic CTA button ----
      var cta = document.getElementById('explore-features-cta');
      if (cta) {
        cta.addEventListener('mousemove', function (e) {
          var rect = cta.getBoundingClientRect();
          var x = e.clientX - rect.left - rect.width / 2;
          var y = e.clientY - rect.top - rect.height / 2;
          cta.style.transform = 'translate(' + x * 0.15 + 'px,' + y * 0.3 + 'px)';
        });
        cta.addEventListener('mouseleave', function () {
          cta.style.transform = '';
        });
      }
    }

    if (window.lucide) window.lucide.createIcons();
  })();
</script>
@endpush
@endonce
