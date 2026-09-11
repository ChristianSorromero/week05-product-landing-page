{{--
    Testimonial card component
    Usage: <x-testimonial-card :testimonial="$testimonial" />
    Expects $testimonial = [
        'quote' => '...', 'name' => '...', 'role' => '...',
        'rating' => 5, 'highlighted' => true|false
    ]
    Note: no 'avatar' image needed — a default initials avatar is generated from 'name'.
--}}
@props(['testimonial'])

@php
    $highlighted = $testimonial['highlighted'] ?? false;

    // Build initials from the name, e.g. "Maria Santos" -> "MS"
    $nameParts = preg_split('/\s+/', trim($testimonial['name'] ?? ''));
    $initials = strtoupper(
        substr($nameParts[0] ?? '', 0, 1) . substr(end($nameParts) ?? '', 0, 1)
    );

    // Rotate through a small set of brand-friendly avatar colors based on the name
    $avatarPalettes = [
        ['bg' => 'bg-primary-100', 'text' => 'text-primary-700'],
        ['bg' => 'bg-secondary-100', 'text' => 'text-secondary-700'],
        ['bg' => 'bg-amber-100', 'text' => 'text-amber-700'],
        ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-700'],
    ];
    $paletteIndex = crc32($testimonial['name'] ?? '') % count($avatarPalettes);
    $palette = $avatarPalettes[$paletteIndex];
@endphp

<div class="min-w-[85%] snap-center rounded-2xl {{ $highlighted ? 'border-2 border-primary-600 shadow-xl' : 'border border-slate-100 shadow-md hover:shadow-xl' }} bg-white p-8 transition sm:min-w-[360px] md:min-w-0">
  <div class="mb-5 flex gap-1 {{ $highlighted ? 'text-primary-600' : 'text-amber-400' }}">
    @for ($i = 0; $i < ($testimonial['rating'] ?? 5); $i++)
      <i data-lucide="star" class="h-5 w-5 fill-current"></i>
    @endfor
  </div>
  <p class="mb-8 leading-relaxed text-slate-600">{{ $testimonial['quote'] }}</p>
  <div class="flex items-center gap-3">
    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full {{ $palette['bg'] }} {{ $palette['text'] }} font-heading text-sm font-bold" aria-hidden="true">
      {{ $initials ?: '?' }}
    </span>
    <div>
      <p class="font-heading font-bold {{ $highlighted ? 'text-primary-600' : 'text-slate-900' }}">{{ $testimonial['name'] }}</p>
      <p class="text-sm text-slate-500">{{ $testimonial['role'] }}</p>
    </div>
  </div>
</div>