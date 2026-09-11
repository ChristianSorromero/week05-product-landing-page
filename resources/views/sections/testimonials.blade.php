{{-- ===================== TESTIMONIALS ===================== --}}
<section id="testimonials" class="bg-white py-20 md:py-28">
  <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div data-reveal class="mx-auto mb-14 max-w-2xl text-center">
      <h2 class="font-heading text-4xl font-bold text-slate-900 md:text-5xl">Lumban's Trusted Laundry Service</h2>
    </div>

    <div id="testi-track" class="no-scrollbar flex snap-x snap-mandatory gap-8 overflow-x-auto pb-4 md:grid md:grid-cols-3 md:overflow-visible md:pb-0">
      @foreach ($testimonials as $i => $testimonial)
        <div data-reveal data-reveal-delay="{{ $i * 120 }}">
          <x-testimonial-card :testimonial="$testimonial" />
        </div>
      @endforeach
    </div>
  </div>
</section>
