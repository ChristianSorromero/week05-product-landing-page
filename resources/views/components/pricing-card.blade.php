{{--
    Pricing card component
    Usage: <x-pricing-card :plan="$plan" />
    Expects $plan = [
        'name' => 'Smart Clean',
        'tagline' => 'Balanced cleaning for mixed clothes',
        'icon' => 'sparkles',
        'highlighted' => true|false,
        'badge' => 'Most Popular' (optional),
        'price' => '₱180',                 // string — supports single price or a range like '₱180 – ₱190'
        'price_prefix' => 'Starts at',      // optional — shown above the price, e.g. for ranges
        'price_suffix' => '/ load',         // optional — shown after the price
        'price_note' => 'up to 8 kg',       // optional — shown under the price
        'features' => ['...'],
        'best_for' => 'Daily laundry with mixed fabrics', // optional
        'cta_url' => '#'
    ]
--}}
@props(['plan'])

@php
    $highlighted = $plan['highlighted'] ?? false;
@endphp

@if ($highlighted)
    {{-- Highlighted / most popular plan --}}
    <div class="group relative rounded-2xl bg-primary-900 p-8 shadow-2xl transition-all duration-300 ease-out hover:-translate-y-2 hover:shadow-[0_25px_50px_-12px_rgba(2,132,199,0.45)] lg:scale-105 lg:hover:scale-[1.07]">

        @if (!empty($plan['badge']))
            <span class="absolute -top-4 right-8 rounded-full bg-secondary-500 px-4 py-1.5 text-sm font-semibold text-white">{{ $plan['badge'] }}</span>
        @endif

        <span class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-white/10 text-secondary-400 transition-transform duration-300 ease-out group-hover:scale-110 group-hover:rotate-6">
            <i data-lucide="{{ $plan['icon'] }}" class="h-6 w-6"></i>
        </span>

        <h3 class="mb-1 font-heading text-xl font-bold text-white">{{ $plan['name'] }}</h3>
        <p class="mb-6 text-primary-200">{{ $plan['tagline'] }}</p>

        <div class="mb-6">
            @if (!empty($plan['price_prefix']))
                <p class="mb-1 text-sm font-semibold uppercase tracking-wide text-primary-300">{{ $plan['price_prefix'] }}</p>
            @endif
            <p>
                <span class="font-heading text-4xl font-bold text-white">{{ $plan['price'] }}</span>
                @if (!empty($plan['price_suffix']))
                    <span class="text-primary-200">{{ $plan['price_suffix'] }}</span>
                @endif
            </p>
            @if (!empty($plan['price_note']))
                <p class="mt-1 text-sm text-primary-300">{{ $plan['price_note'] }}</p>
            @endif
        </div>

        <a href="{{ $plan['cta_url'] ?? '#' }}" class="mb-8 flex items-center justify-center gap-2 rounded-xl bg-secondary-500 py-3 text-center font-semibold text-white shadow-md transition-all duration-300 ease-out hover:bg-white hover:text-primary-900 hover:shadow-lg">
            <span>Choose Plan</span>
            <i data-lucide="arrow-right" class="h-4 w-4 -translate-x-1 opacity-0 transition-all duration-300 ease-out group-hover:translate-x-0 group-hover:opacity-100"></i>
        </a>

        <p class="mb-4 text-sm font-semibold uppercase tracking-wide text-white">Features</p>
        <ul class="space-y-3 text-white">
            @foreach ($plan['features'] as $feature)
                <li class="flex items-start gap-3">
                    <i data-lucide="check" class="mt-0.5 h-5 w-5 shrink-0 text-secondary-400"></i>
                    {{ $feature }}
                </li>
            @endforeach
        </ul>

        @if (!empty($plan['best_for']))
            <div class="mt-6 border-t border-white/20 pt-6">
                <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-white">Best for</p>
                <p class="text-sm text-white">{{ $plan['best_for'] }}</p>
            </div>
        @endif

    </div>
@else
    {{-- Standard plan --}}
    <div class="group rounded-2xl border border-slate-100 bg-white p-8 shadow-md transition-all duration-300 ease-out hover:-translate-y-2 hover:border-primary-100 hover:shadow-2xl hover:shadow-primary-500/10">

        <span class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600 transition-transform duration-300 ease-out group-hover:scale-110 group-hover:rotate-6">
            <i data-lucide="{{ $plan['icon'] }}" class="h-6 w-6"></i>
        </span>

        <h3 class="mb-1 font-heading text-xl font-bold text-slate-900">{{ $plan['name'] }}</h3>
        <p class="mb-6 text-slate-500">{{ $plan['tagline'] }}</p>

        <div class="mb-6">
            @if (!empty($plan['price_prefix']))
                <p class="mb-1 text-sm font-semibold uppercase tracking-wide text-slate-400">{{ $plan['price_prefix'] }}</p>
            @endif
            <p>
                <span class="font-heading text-4xl font-bold text-slate-900">{{ $plan['price'] }}</span>
                @if (!empty($plan['price_suffix']))
                    <span class="text-slate-500">{{ $plan['price_suffix'] }}</span>
                @endif
            </p>
            @if (!empty($plan['price_note']))
                <p class="mt-1 text-sm text-slate-400">{{ $plan['price_note'] }}</p>
            @endif
        </div>

        <a href="{{ $plan['cta_url'] ?? '#' }}" class="mb-8 flex items-center justify-center gap-2 rounded-xl bg-slate-900 py-3 text-center font-semibold text-white shadow-sm transition-all duration-300 ease-out hover:bg-primary-600 hover:shadow-lg hover:shadow-primary-500/30">
            <span>Choose Plan</span>
            <i data-lucide="arrow-right" class="h-4 w-4 -translate-x-1 opacity-0 transition-all duration-300 ease-out group-hover:translate-x-0 group-hover:opacity-100"></i>
        </a>

        <p class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-700">Features</p>
        <ul class="space-y-3 text-slate-700">
            @foreach ($plan['features'] as $feature)
                <li class="flex items-start gap-3">
                    <i data-lucide="check" class="mt-0.5 h-5 w-5 shrink-0 text-primary-600"></i>
                    {{ $feature }}
                </li>
            @endforeach
        </ul>

        @if (!empty($plan['best_for']))
            <div class="mt-6 border-t border-slate-200 pt-6">
                <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-slate-700">Best for</p>
                <p class="text-sm text-slate-600">{{ $plan['best_for'] }}</p>
            </div>
        @endif

    </div>
@endif