{{-- ===================== NAVBAR ===================== --}}
<header id="navbar" class="fixed top-0 inset-x-0 z-50 transition-all duration-300 bg-transparent">
  <nav class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">

      {{-- Logo --}}
      <a href="{{ url('/#home') }}" class="flex items-center shrink-0">
        <img src="{{ asset('laundrylogo.png') }}" alt="{{ config('app.name', "Alley's") }}" class="h-14 w-auto drop-shadow-lg brightness-110">
      </a>

      {{-- Menu (desktop) --}}
      <ul id="nav-links" class="hidden lg:flex items-center gap-9 font-medium">
        @foreach ($navLinks ?? [
            ['label' => 'Home', 'href' => '#home'],
            ['label' => 'Features', 'href' => '#features'],
            ['label' => 'Pricing', 'href' => '#pricing'],
            ['label' => 'Testimonials', 'href' => '#testimonials'],
            ['label' => 'Contact', 'href' => '#contact'],
        ] as $link)
          <li><a href="{{ $link['href'] }}" class="nav-link text-white transition-colors hover:text-secondary-400">{{ $link['label'] }}</a></li>
        @endforeach
      </ul>

      {{-- Right actions (desktop) --}}
      <div class="hidden lg:flex items-center gap-3 shrink-0">
        <a href="#" id="signin-btn" class="rounded-xl border-2 border-white/60 text-white px-5 py-2.5 font-semibold transition-colors hover:bg-white/10">Sign In</a>
        <a href="#pricing" class="rounded-xl bg-secondary-500 px-5 py-2.5 font-semibold text-white shadow-md shadow-secondary-500/30 transition hover:bg-secondary-600">Get Started</a>
      </div>

      {{-- Mobile toggle --}}
      <button id="mobile-menu-btn" class="lg:hidden flex h-10 w-10 items-center justify-center text-white transition-colors" aria-label="Toggle menu">
        <i data-lucide="menu" class="h-7 w-7"></i>
      </button>
    </div>
  </nav>

  {{-- Mobile menu panel --}}
  <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg">
    <ul class="flex flex-col gap-1 px-4 py-4 font-medium text-slate-700">
      @foreach ($navLinks ?? [
          ['label' => 'Home', 'href' => '#home'],
          ['label' => 'Features', 'href' => '#features'],
          ['label' => 'Pricing', 'href' => '#pricing'],
          ['label' => 'Testimonials', 'href' => '#testimonials'],
          ['label' => 'Contact', 'href' => '#contact'],
      ] as $link)
        <li><a href="{{ $link['href'] }}" class="block rounded-lg px-3 py-2.5 hover:bg-slate-50">{{ $link['label'] }}</a></li>
      @endforeach
    </ul>
    <div class="flex gap-3 px-4 pb-5">
      <a href="#" class="flex-1 text-center rounded-xl border-2 border-slate-200 text-slate-700 px-5 py-2.5 font-semibold">Sign In</a>
      <a href="#pricing" class="flex-1 text-center rounded-xl bg-secondary-500 px-5 py-2.5 font-semibold text-white">Get Started</a>
    </div>
  </div>
</header>
