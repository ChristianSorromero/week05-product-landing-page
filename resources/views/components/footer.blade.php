{{-- ===================== FOOTER ===================== --}}
<footer class="relative overflow-hidden bg-primary-950 pt-20 pb-10" id="contact">

  {{-- scalloped cloud top divider --}}
  <div class="pointer-events-none absolute top-0 left-0 right-0 -translate-y-[98%] leading-none">
    <svg viewBox="0 0 1440 100" class="h-16 w-full md:h-24" preserveAspectRatio="none">
      <path fill="#0e1c3d" d="M0,80 C120,20 240,100 360,60 C480,20 600,100 720,60 C840,20 960,100 1080,60 C1200,20 1320,100 1440,60 L1440,100 L0,100 Z"/>
    </svg>
  </div>

  <div class="container relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    {{-- Newsletter --}}
    <div class="mb-12 flex flex-wrap items-center justify-between gap-6 border-b border-white/10 pb-12">
      <div>
        <h3 class="mb-2 font-heading text-2xl font-bold text-white md:text-3xl">Get updates from our newsletter</h3>
        <p class="text-primary-200">Laundry tips, offers, and news — straight to your inbox.</p>
      </div>
      <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex w-full max-w-md rounded-full bg-white p-1.5">
        @csrf
        <label for="newsletter-email" class="sr-only">Email address</label>
        <input id="newsletter-email" name="email" type="email" required placeholder="Enter your email" class="flex-1 rounded-full bg-transparent px-4 text-slate-700 placeholder:text-slate-400 focus:outline-none">
        <button type="submit" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary-600 text-white transition hover:bg-primary-700" aria-label="Subscribe">
          <i data-lucide="send" class="h-5 w-5"></i>
        </button>
      </form>
    </div>

    {{-- Columns --}}
    <div class="mb-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

      <div>
        <div class="mb-4">
          <img src="{{ asset('laundrylogo.png') }}" alt="{{ config('app.name', "Alley's") }}" class="h-14 w-auto brightness-110">
        </div>
        <p class="mb-6 leading-relaxed text-primary-200">Door-to-door laundry and dry cleaning for busy people who'd rather not think about laundry.</p>
        <p class="mb-2 font-semibold text-white">Working Hours</p>
        <p class="flex items-center gap-2 text-primary-200"><i data-lucide="clock" class="h-4 w-4"></i> Mon – Sat: 8AM – 8PM</p>
        <p class="mt-1 flex items-center gap-2 text-primary-200"><i data-lucide="clock" class="h-4 w-4"></i> Sunday: Closed</p>
      </div>

      <div>
        <h4 class="mb-5 font-heading font-bold text-white">Quick Links</h4>
        <ul class="space-y-3 text-primary-200">
          <li><a href="#home" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Home</a></li>
          <li><a href="#features" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Features</a></li>
          <li><a href="#pricing" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Pricing</a></li>
          <li><a href="#testimonials" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Testimonials</a></li>
        </ul>
      </div>

      <div>
        <h4 class="mb-5 font-heading font-bold text-white">Services</h4>
        <ul class="space-y-3 text-primary-200">
          <li><a href="#" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Wash &amp; Fold</a></li>
          <li><a href="#" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Dry Cleaning</a></li>
          <li><a href="#" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Ironing</a></li>
          <li><a href="#" class="flex items-center gap-2 transition hover:text-white"><i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i> Pickup &amp; Delivery</a></li>
        </ul>
      </div>

      <div>
        <h4 class="mb-5 font-heading font-bold text-white">Contact Us</h4>
        <ul class="space-y-4 text-primary-200">
          <li class="flex items-start gap-3"><i data-lucide="map-pin" class="mt-0.5 h-5 w-5 shrink-0"></i> Zamora St. Brgy. Bagong Silang Lumban, Laguna</li>
          <li class="flex items-center gap-3"><i data-lucide="phone" class="h-5 w-5 shrink-0"></i> 0967-255-5713</li>
          <li class="flex items-center gap-3"><i data-lucide="mail" class="h-5 w-5 shrink-0"></i> hello@alleyslaundry.com</li>
        </ul>
      </div>

    </div>

    {{-- Bottom bar --}}
    <div class="flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-8">
      <p class="text-sm text-primary-300">Copyright &copy; {{ date('Y') }} {{ config('app.name', "Alley's") }}. All Rights Reserved.</p>
      <div class="flex gap-3">
        <a href="#" aria-label="Facebook" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 text-white transition hover:bg-white/10"><i data-lucide="facebook" class="h-4 w-4"></i></a>
        <a href="#" aria-label="Twitter" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 text-white transition hover:bg-white/10"><i data-lucide="twitter" class="h-4 w-4"></i></a>
        <a href="#" aria-label="Instagram" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 text-white transition hover:bg-white/10"><i data-lucide="instagram" class="h-4 w-4"></i></a>
        <a href="#" aria-label="LinkedIn" class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 text-white transition hover:bg-white/10"><i data-lucide="linkedin" class="h-4 w-4"></i></a>
      </div>
    </div>
  </div>
</footer>
