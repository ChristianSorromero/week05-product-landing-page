<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the landing page.
     *
     * All content below is plain array data for now. Each block is shaped
     * so it can be swapped for an Eloquent query later
     * (e.g. Feature::all(), Plan::all(), Testimonial::all()) without
     * touching any Blade view or component.
     */
    public function index(): View
    {
        $features = [
            [
                'icon' => 'clock',
                'iconBg' => 'bg-primary-50',
                'iconColor' => 'text-primary-600',
                'title' => 'Fast Turnaround',
                'description' => 'Most orders are washed, dried, and folded within 24 hours flat.',
            ],
            [
                'icon' => 'tag',
                'iconBg' => 'bg-secondary-50',
                'iconColor' => 'text-secondary-600',
                'title' => 'Affordable Pricing',
                'description' => 'Transparent, per-pound rates with no hidden fees or surprise charges.',
            ],
            [
                'icon' => 'leaf',
                'iconBg' => 'bg-emerald-50',
                'iconColor' => 'text-emerald-600',
                'title' => 'Eco-Friendly Cleaning',
                'description' => 'Biodegradable detergents and energy-efficient machines, always.',
            ],
            [
                'icon' => 'truck',
                'iconBg' => 'bg-sky-50',
                'iconColor' => 'text-sky-600',
                'title' => 'Pickup & Delivery',
                'description' => 'Free door-to-door service on every order, scheduled around you.',
            ],
            [
                'icon' => 'shirt',
                'iconBg' => 'bg-indigo-50',
                'iconColor' => 'text-indigo-600',
                'title' => 'Fabric Care Experts',
                'description' => "Every garment is sorted and treated by its fabric, not just its color.",
            ],
            [
                'icon' => 'smile',
                'iconBg' => 'bg-teal-50',
                'iconColor' => 'text-teal-600',
                'title' => 'Friendly, Attentive Staff',
                'description' => 'Every order is handled by trained attendants who treat your clothes like their own.',
                'detail' => 'Say hi at your nearest branch',
                'avatars' => [
                    'https://i.pravatar.cc/100?img=5',
                    'https://i.pravatar.cc/100?img=12',
                    'https://i.pravatar.cc/100?img=47',
                ],
            ],
        ];

        $showcaseItems = [
            [
                'title' => 'Fold & Go',
                'description' => 'Follow every step of your order, from pickup to your doorstep, right from the app.',
                'image' => asset('fold.png'),
                'alt' => 'Mobile app showing a live laundry order status',
                'highlighted' => true,
                'icon' => 'layers',
            ],
            [
                'title' => 'Smart Fabric Care',
                'description' => "Delicates, denim, and everything between get the treatment they're made for.",
                'image' => asset('smart.png'),
                'icon' => 'shirt',
                'alt' => 'Neatly folded shirts sorted by fabric type',
            ],
            [
                'title' => 'Express Pickup',
                'description' => 'Same-day pickup slots for whenever the laundry pile gets out of hand.',
                'image' => asset('express.png'),
                'icon' => 'truck',
                'alt' => 'Delivery driver picking up a laundry bag',
            ],
        ];

        $plans = [
    [
        'name' => 'Lite Wash',
        'tagline' => 'For light, everyday loads',
        'icon' => 'droplet',
        'price' => '₱165',
        'price_suffix' => '/ load',
        'price_note' => 'up to 6 kg',
        'features' => [
            'Regular Clothes (Wash – Dry – Fold)',
            'Free detergent & fabcon',
            'Standard processing',
        ],
        'best_for' => 'Small loads like tops, shorts, skirts',
        'cta_url' => '#',
    ],
    [
        'name' => 'Smart Clean',
        'tagline' => 'Balanced cleaning for mixed clothes',
        'icon' => 'sparkles',
        'highlighted' => true,
        'badge' => 'Most Popular',
        'price' => '₱180',
        'price_suffix' => '/ load',
        'price_note' => 'up to 8 kg',
        'features' => [
            'Regular + Mix Clothes (tops, pants, denim)',
            'Wash – Dry – Fold',
            'Free detergent & fabcon',
            'Better load optimization',
        ],
        'best_for' => 'Daily laundry with mixed fabrics',
        'cta_url' => '#',
    ],
    [
        'name' => 'MaxCare',
        'tagline' => 'For heavy items & premium care',
        'icon' => 'crown',
        'price' => '₱180 – ₱190',
        'price_prefix' => 'Starts at',
        'features' => [
            'Heavy Clothes (max 6 kg)',
            'Comforter – ₱190 / pc',
            'Blanket / Linen – ₱180 (max 5 kg)',
            'Priority handling',
            'Optional pickup & delivery',
        ],
        'best_for' => 'Bulky items, jackets, comforters',
        'cta_url' => '#',
    ],
];

        $testimonials = [
    [
        'quote' => "Sobrang convenient! Nagpapick-up lang ako tapos kinabukasan ready na agad. Ang bango pa ng damit, parang bagong bili.",
        'name' => 'Jessa Marquez',
        'role' => 'Working Parent',
        'rating' => 5,
    ],
    [
        'quote' => "First time ko magpa-laundry dito and legit okay service. Walang nawawala, maingat sila sa clothes.",
        'name' => 'Kevin Pulo',
        'role' => 'Small Business Owner',
        'rating' => 5,
        'highlighted' => true,
    ],
    [
        'quote' => 'Suki na ako dito. Consistent yung quality, hindi pabago-bago unlike ibang shops.',
        'name' => 'Anne Castro',
        'role' => 'Apartment Resident',
        'rating' => 5,
    ],
];

        $trustedBy = ['Homeaway', 'Urbanly', 'Metro Living', 'Freshly', 'Swift Homes', 'Nestly'];

        return view('pages.home', compact(
            'features',
            'showcaseItems',
            'plans',
            'testimonials',
            'trustedBy'
        ));
    }
}