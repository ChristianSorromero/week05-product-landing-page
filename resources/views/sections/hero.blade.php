{{-- ===================== HERO SECTION ===================== --}}
<section id="home" class="relative h-screen w-full overflow-hidden">

  {{-- BACKGROUND IMAGE --}}
  <img 
    src="{{ asset('alley1.png') }}" 
    alt="Laundry Shop" 
    class="absolute inset-0 h-full w-full object-cover"
  >

  {{-- LEFT GRADIENT OVERLAY --}}
  <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 via-blue-900/80 to-transparent"></div>

  {{-- BUBBLES --}}
  <div class="pointer-events-none absolute inset-0">
    <span class="absolute left-[4%] top-[6%] h-24 w-24 rounded-full bg-white/20 blur-sm"></span>
    <span class="absolute left-[10%] top-[22%] h-12 w-12 rounded-full bg-white/20"></span>
    <span class="absolute left-[2%] bottom-[18%] h-16 w-16 rounded-full bg-white/20"></span>
    <span class="absolute left-[34%] bottom-[10%] h-20 w-20 rounded-full bg-white/20"></span>
  </div>

  {{-- CONTENT --}}
  <div class="relative z-10 container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 h-full flex items-center">
    
    <div class="max-w-xl text-white">

      <h1 data-reveal class="mt-5 font-heading text-5xl md:text-6xl font-bold leading-[1.05]">
        Quality Laundry<br>
        Every <span class="text-cyan-300">Load</span>
      </h1>

      <p data-reveal data-reveal-delay="150" class="mt-6 max-w-md text-lg text-blue-100">
        Clean, fresh, and ready for what's next. We take care of your laundry, 
        so you can focus on what matters most.
      </p>

      <div data-reveal data-reveal-delay="300" class="mt-10 flex flex-wrap gap-4">
        <a href="#services" class="inline-flex items-center gap-2 rounded-full bg-emerald-500 px-7 py-4 font-semibold text-white shadow-lg shadow-emerald-500/30 hover:bg-emerald-600 transition">
          Our Services
          <i data-lucide="arrow-right" class="h-4 w-4"></i>
        </a>

        <a href="#contact" class="rounded-full border-2 border-white/40 px-7 py-4 font-semibold text-white hover:bg-white/10 transition">
          Visit Us
        </a>
      </div>
    </div>
  </div>

</section>