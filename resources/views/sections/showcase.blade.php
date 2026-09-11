{{-- ===================== PRODUCT SHOWCASE ===================== --}}
<section id="product" class="relative overflow-hidden bg-gradient-to-b from-sky-50 via-white to-white py-24 md:py-32">

  {{-- soft ambient blobs --}}
  <div class="pointer-events-none absolute -left-24 top-10 h-72 w-72 rounded-full bg-sky-200/40 blur-3xl" aria-hidden="true"></div>
  <div class="pointer-events-none absolute -right-24 bottom-10 h-80 w-80 rounded-full bg-secondary-200/30 blur-3xl" aria-hidden="true"></div>

  {{-- drifting soap bubbles layer --}}
  <div id="product-bubbles" class="pointer-events-none absolute inset-0 z-0 overflow-hidden" aria-hidden="true"></div>

  <div class="container relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div class="mx-auto mb-16 max-w-2xl text-center md:mb-20">
      <span class="mb-5 inline-flex items-center gap-2 rounded-full bg-white px-4 py-1.5 text-sm font-semibold text-secondary-600 shadow-sm ring-1 ring-secondary-100">
        <i data-lucide="sparkles" class="h-4 w-4"></i>
        The Alley's Experience
      </span>
      <h2 class="font-heading text-4xl font-extrabold leading-tight text-slate-900 sm:text-5xl md:text-6xl">
        We take pride in <span class="relative inline-block text-cyan-500">
          every load
          <svg class="absolute -bottom-2 left-0 w-full text-cyan-400" viewBox="0 0 200 12" preserveAspectRatio="none" aria-hidden="true">
            <path d="M2 9 C 50 -2, 150 -2, 198 9" stroke="currentColor" stroke-width="4" fill="none" stroke-linecap="round"/>
          </svg>
        </span>
      </h2>
      <p class="mx-auto mt-6 max-w-xl text-lg text-slate-500">
        From the first spin to the final fold, every detail is handled with care so your clothes always come back better.
      </p>
    </div>

    <div class="grid items-start gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3 lg:gap-6 xl:gap-8">
      @foreach ($showcaseItems as $i => $item)
        <button
          type="button"
          data-showcase-card
          class="showcase-card-btn group block w-full rounded-2xl text-left opacity-0 translate-y-8 outline-none transition-[opacity,transform,box-shadow] duration-500 ease-out hover:-translate-y-1.5 hover:shadow-xl focus-visible:ring-2 focus-visible:ring-primary-500 focus-visible:ring-offset-2 {{ ($item['highlighted'] ?? false) ? 'is-active' : '' }}"
          style="transition-delay: {{ ($i % 3) * 120 }}ms"
        >
          <x-showcase-card :item="$item" />
        </button>
      @endforeach
    </div>
  </div>

  {{-- wave divider at the bottom, transitions into next section --}}
  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-10 -mb-1 leading-none" aria-hidden="true">
    <svg class="h-14 w-full" viewBox="0 0 1200 60" preserveAspectRatio="none">
      <path d="M0,32 C200,60 400,0 600,20 C800,40 1000,10 1200,30 L1200,60 L0,60 Z" fill="#F8FAFC"/>
    </svg>
  </div>
</section>

@once
@push('styles')
<style>
  .product-bubble {
    position: absolute;
    bottom: -10%;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.9), rgba(56, 189, 248, 0.12) 70%);
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: inset 0 0 6px rgba(255, 255, 255, 0.5), 0 0 6px rgba(56, 189, 248, 0.12);
    animation-name: product-bubble-rise;
    animation-timing-function: linear;
    animation-fill-mode: forwards;
    will-change: transform, opacity;
  }

  @keyframes product-bubble-rise {
    0%   { transform: translateY(0) translateX(0); opacity: 0; }
    12%  { opacity: 0.8; }
    50%  { transform: translateY(-50vh) translateX(var(--drift, 16px)); }
    100% { transform: translateY(-105vh) translateX(calc(var(--drift, 16px) * -1)); opacity: 0; }
  }

  @media (prefers-reduced-motion: reduce) {
    #product-bubbles { display: none; }
  }

  /* ---- click-to-highlight state: navy blue like "Fold & Go" ---- */
  .showcase-card-btn {
    transform-origin: center;
  }

  .showcase-card-btn.is-active {
    box-shadow:
      0 0 0 3px rgba(14, 165, 233, 0.35),
      0 20px 30px -12px rgba(15, 23, 42, 0.25);
    transform: translateY(-6px) scale(1.015);
  }

  .showcase-card-btn.is-active .showcase-card-inner {
    background-color: #172554; /* primary-900 */
    box-shadow: none;
  }

  .showcase-card-btn.is-active .showcase-card-title {
    color: #ffffff;
  }

  .showcase-card-btn.is-active .showcase-card-desc {
    color: #bfdbfe; /* soft primary-100-ish */
  }

  .showcase-card-btn.is-active .showcase-card-icon {
    background-color: #22c55e; /* secondary-500 accent */
    color: #ffffff;
    box-shadow: none;
  }
</style>
@endpush

@push('scripts')
<script>
  (function () {
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var section = document.getElementById('product');

    // ---- staggered scroll reveal ----
    var cards = document.querySelectorAll('[data-showcase-card]');
    if (reduceMotion) {
      cards.forEach(function (c) { c.classList.remove('opacity-0', 'translate-y-8'); });
    } else if ('IntersectionObserver' in window) {
      var cardIo = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.remove('opacity-0', 'translate-y-8');
            cardIo.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15 });
      cards.forEach(function (c) { cardIo.observe(c); });
    } else {
      cards.forEach(function (c) { c.classList.remove('opacity-0', 'translate-y-8'); });
    }

    // ---- click-to-highlight (single-select across all cards) ----
    cards.forEach(function (card) {
      card.addEventListener('click', function () {
        var alreadyActive = card.classList.contains('is-active');
        cards.forEach(function (c) { c.classList.remove('is-active'); });
        if (!alreadyActive) {
          card.classList.add('is-active');
        }
      });
    });

    // ---- drifting soap bubbles ----
    if (!reduceMotion) {
      var bubbleContainer = document.getElementById('product-bubbles');
      var maxBubbles = 12;
      var active = 0;
      var timer = null;

      function spawnBubble() {
        if (!bubbleContainer || active >= maxBubbles) return;

        var b = document.createElement('span');
        b.className = 'product-bubble';

        var size = Math.random() * 22 + 8; // 8px - 30px
        var left = Math.random() * 100;
        var duration = Math.random() * 7 + 10; // 10s - 17s
        var delay = Math.random() * 2;
        var drift = (Math.random() * 50 - 25) + 'px';

        b.style.width = size + 'px';
        b.style.height = size + 'px';
        b.style.left = left + '%';
        b.style.setProperty('--drift', drift);
        b.style.animationDuration = duration + 's';
        b.style.animationDelay = delay + 's';

        bubbleContainer.appendChild(b);
        active++;

        b.addEventListener('animationend', function () {
          b.remove();
          active--;
        });
      }

      for (var i = 0; i < 4; i++) { setTimeout(spawnBubble, i * 500); }
      timer = setInterval(spawnBubble, 1300);

      if ('IntersectionObserver' in window && section) {
        var visIo = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              if (!timer) timer = setInterval(spawnBubble, 1300);
            } else {
              clearInterval(timer);
              timer = null;
            }
          });
        }, { threshold: 0 });
        visIo.observe(section);
      }
    }

    if (window.lucide) window.lucide.createIcons();
  })();
</script>
@endpush
@endonce