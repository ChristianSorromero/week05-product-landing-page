<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', "Alley's — Fresh Clothes, Zero Stress")</title>
<meta name="description" content="Alley's is a premium pickup-and-delivery laundry service. Fast turnaround, eco-friendly cleaning, and fabric care experts.">

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">

{{-- Tailwind CSS (CDN) --}}
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: {
            50:  '#eef4ff',
            100: '#dbe7ff',
            200: '#b8cffe',
            400: '#5b8def',
            500: '#3569e8',
            600: '#2451d6',
            700: '#1d3fae',
            800: '#1b3689',
            900: '#152a56',
            950: '#0e1c3d'
          },
          secondary: {
            50:  '#eefdf4',
            100: '#d7f9e3',
            400: '#4ade80',
            500: '#22c55e',
            600: '#16a34a',
            700: '#15803d'
          }
        },
        fontFamily: {
          heading: ['Sora', 'sans-serif'],
          sans: ['Inter', 'sans-serif']
        }
      }
    }
  }
</script>

{{-- Lucide Icons --}}
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

{{-- Compiled / custom app CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

@stack('styles')
</head>

<body class="bg-white text-slate-700 antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Scroll to top button --}}
    <button id="scroll-top" class="fixed bottom-6 right-6 z-40 flex h-12 w-12 items-center justify-center rounded-full bg-primary-600 text-white shadow-lg opacity-0 pointer-events-none transition hover:bg-primary-700" aria-label="Scroll to top">
        <i data-lucide="arrow-up" class="h-5 w-5"></i>
    </button>

    {{-- App JS (nav, mobile menu, testimonials slider, scroll-top) --}}
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
