{{--
    Showcase card component
    Usage: <x-showcase-card :item="$item" />
    Expects $item = [
        'title' => '...', 'description' => '...', 'image' => 'seed/500/380', 'alt' => '...',
        'icon' => 'map-pin', // optional — Lucide icon name matching the title's theme
        'highlighted' => true|false // optional — sets the INITIAL active state only
    ]
--}}
@props(['item'])

@php
    $icon = $item['icon'] ?? 'arrow-up-right';
@endphp

<div class="showcase-card-inner flex flex-col rounded-2xl bg-slate-50 p-6 shadow-md transition-colors duration-300">
  <div class="mb-4 flex items-start justify-between">
    <h3 class="showcase-card-title font-heading text-xl font-bold text-slate-900 transition-colors duration-300">{{ $item['title'] }}</h3>
    <span class="showcase-card-icon flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-white text-primary-600 shadow-sm transition-all duration-300 group-hover:scale-110 group-hover:rotate-6">
      <i data-lucide="{{ $icon }}" class="h-5 w-5"></i>
    </span>
  </div>
  <p class="showcase-card-desc mb-6 text-slate-500 transition-colors duration-300">{{ $item['description'] }}</p>
  <img src="{{ $item['image'] }}" alt="{{ $item['alt'] }}" class="mt-auto h-56 w-full rounded-xl object-cover">
</div>