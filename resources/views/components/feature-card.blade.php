{{--
    Feature card component
    Usage: <x-feature-card :feature="$feature" />
    Expects $feature = [
        'icon'        => 'clock',
        'iconBg'      => 'bg-primary-50',
        'iconColor'   => 'text-primary-600',
        'title'       => '...',
        'description' => '...',
        'detail'      => '...',   // optional — short line revealed on hover
    ]
--}}
@props(['feature'])

<div
  data-feature-card
  class="feature-card group relative isolate flex flex-col overflow-hidden rounded-2xl border border-blue-700/50 bg-blue-800/60 p-8 opacity-0 translate-y-6 shadow-md transition-[opacity,transform,box-shadow] duration-500 ease-out will-change-transform hover:shadow-2xl hover:shadow-cyan-400/20"
>
  {{-- cursor-tracking spotlight --}}
  <div
    class="pointer-events-none absolute inset-0 z-0 opacity-0 transition-opacity duration-300 group-hover:opacity-100"
    style="background: radial-gradient(360px circle at var(--x,50%) var(--y,50%), rgba(59,130,246,0.10), transparent 65%);"
  ></div>

  {{-- top accent bar --}}
  <span class="absolute inset-x-0 top-0 z-10 h-[3px] origin-left scale-x-0 bg-gradient-to-r from-primary-500 via-primary-400 to-secondary-500 transition-transform duration-500 ease-out group-hover:scale-x-100"></span>

  {{-- corner glow that grows on hover --}}
  <span class="pointer-events-none absolute -right-10 -top-10 z-0 h-32 w-32 rounded-full bg-primary-100 opacity-0 blur-2xl transition-all duration-500 group-hover:opacity-70"></span>

  <div class="relative z-10 flex flex-1 flex-col">
    <span class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl {{ $feature['iconBg'] }} {{ $feature['iconColor'] }} transition-transform duration-500 ease-out group-hover:-translate-y-1 group-hover:rotate-6 group-hover:scale-110">
      <i data-lucide="{{ $feature['icon'] }}" class="h-7 w-7"></i>
    </span>

    <h3 class="mb-2 font-heading text-xl font-bold text-white transition-colors group-hover:text-cyan-300">
      {{ $feature['title'] }}
    </h3>
    <p class="leading-relaxed text-blue-100">{{ $feature['description'] }}</p>

    {{-- optional staggered avatar reveal, e.g. for a "meet the team" style card --}}
    @isset($feature['avatars'])
      <div class="mt-4 flex items-center -space-x-2">
        @foreach ($feature['avatars'] as $i => $avatar)
          <img
            src="{{ $avatar }}"
            alt="Staff member"
            class="h-8 w-8 -translate-x-2 scale-75 rounded-full border-2 border-white object-cover opacity-0 shadow-sm transition-all duration-500 ease-out group-hover:translate-x-0 group-hover:scale-100 group-hover:opacity-100"
            style="transition-delay: {{ $i * 80 }}ms"
          >
        @endforeach
        <span
          class="ml-3 text-xs font-medium text-slate-400 opacity-0 transition-opacity duration-500 ease-out group-hover:opacity-100"
          style="transition-delay: {{ count($feature['avatars']) * 80 }}ms"
        >
          Meet the team
        </span>
      </div>
    @endisset

    @isset($feature['detail'])
      <div class="grid grid-rows-[0fr] transition-[grid-template-rows] duration-500 ease-out group-hover:grid-rows-[1fr]">
        <div class="overflow-hidden">
          <p class="mt-4 flex items-center gap-1.5 border-t border-slate-100 pt-4 text-sm font-semibold text-primary-600">
            <i data-lucide="arrow-up-right" class="h-3.5 w-3.5"></i>
            {{ $feature['detail'] }}
          </p>
        </div>
      </div>
    @endisset
  </div>
</div>