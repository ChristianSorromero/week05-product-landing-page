{{-- ===================== PRICING SECTION ===================== --}}
<section id="pricing" class="bg-slate-50 py-20 md:py-28">
  <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div data-reveal class="mx-auto mb-16 max-w-2xl text-center">
      <h2 class="mb-4 font-heading text-4xl font-bold text-slate-900 md:text-5xl">Simple, transparent laundry pricing</h2>
      <p class="text-lg text-slate-500">Pick the plan that matches your laundry pile. Switch or cancel anytime.</p>
    </div>

    <div class="grid items-center gap-8 lg:grid-cols-3">
      @foreach ($plans as $i => $plan)
        <div data-reveal data-reveal-delay="{{ $i * 120 }}">
          <x-pricing-card :plan="$plan" />
        </div>
      @endforeach
    </div>
  </div>
</section>