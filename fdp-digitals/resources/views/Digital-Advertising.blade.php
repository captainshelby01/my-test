@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-black text-white">
    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-red-900/80 to-black/90"></div>
    <div class="relative max-w-7xl mx-auto px-6 py-32">
        <h1 class="text-5xl font-extrabold mb-6">
            Digital Advertising That <span class="text-red-600">Converts</span>
        </h1>
        <p class="max-w-2xl text-lg text-gray-200">
            Data-driven media buying and performance campaigns designed to attract, convert, and scale your business.
        </p>
    </div>
</section>

{{-- EXPLANATION SECTION --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16">
        <div>
            <h2 class="text-4xl font-bold mb-6 text-black">What Is Digital Advertising?</h2>
            <p class="text-gray-600 leading-relaxed">
                Digital advertising allows brands to reach the right audience, at the right time, with measurable results. At FDP Digitals, we design, launch, and optimize campaigns across multiple channels to maximize ROI.
            </p>
        </div>
        <div class="bg-gray-100 rounded-xl p-10 border border-gray-200 text-black">
            <ul class="space-y-4 font-medium">
                <li>✔ Audience research & targeting</li>
                <li>✔ Creative strategy & messaging</li>
                <li>✔ Media buying & optimization</li>
                <li>✔ Performance tracking & reporting</li>
            </ul>
        </div>
    </div>
</section>

{{-- MEDIA CHANNELS --}}
<section class="py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center text-black">
        <h2 class="text-4xl font-extrabold mb-12">Media <span class="text-red-600">Channels</span></h2>
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 text-left">
            
            <a href="https://instagram.com/fdpdigitals" target="_blank" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group block">
                <div class="text-pink-600 text-4xl mb-4 group-hover:scale-110 transition duration-300">📸</div>
                <h4 class="text-xl font-bold mb-2">Instagram Ads</h4>
                <p class="text-sm text-gray-500">Visual storytelling and influencer-style placements.</p>
            </a>

            <a href="https://x.com/fdpdigitals" target="_blank" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group block">
                <div class="text-black text-4xl mb-4 group-hover:scale-110 transition duration-300">𝕏</div>
                <h4 class="text-xl font-bold mb-2">Twitter (X) Ads</h4>
                <p class="text-sm text-gray-500">Real-time engagement and trending conversations.</p>
            </a>

            <a href="https://tiktok.com/@fdpdigitals" target="_blank" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group block">
                <div class="text-cyan-500 text-4xl mb-4 group-hover:scale-110 transition duration-300">🎵</div>
                <h4 class="text-xl font-bold mb-2">TikTok Ads</h4>
                <p class="text-sm text-gray-500">High-energy viral content for younger demographics.</p>
            </a>

            <a href="https://facebook.com/fdpdigitals" target="_blank" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 group block">
                <div class="text-blue-700 text-4xl mb-4 group-hover:scale-110 transition duration-300">👥</div>
                <h4 class="text-xl font-bold mb-2">Facebook Ads</h4>
                <p class="text-sm text-gray-500">Precision targeting across the world's largest network.</p>
            </a>

        </div>
    </div>
</section>

{{-- COMPACT LEAD CAPTURE --}}
@php
    $ctaTexts = ['Get Free Strategy', 'Start a Campaign', 'Book Free Consultation'];
    $ctaText = $ctaTexts[array_rand($ctaTexts)];
@endphp

<section class="relative py-32 bg-black overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black via-red-900 to-black opacity-80"></div>
    <div class="relative max-w-4xl mx-auto px-6 text-center text-white">
        <h2 class="text-5xl font-extrabold mb-6">Ready to Turn Clicks Into <span class="text-red-600">Customers</span>?</h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500/20 border border-green-500 text-green-400 rounded-xl inline-block">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-3xl mx-auto">
            <form method="POST" action="{{ route('contact.submit') }}"
                  class="bg-white/10 backdrop-blur-lg rounded-xl p-6 grid gap-4 md:grid-cols-3">
                @csrf
                <input type="hidden" name="service" value="Digital Advertising">
                <input type="hidden" name="message" value="Lead from Digital Advertising Page">

                <input type="text" name="name" placeholder="Your Name" required
                    class="px-5 py-3 rounded-lg text-black bg-white focus:outline-none text-sm border-none shadow-inner">

                <input type="email" name="email" placeholder="Email Address" required
                    class="px-5 py-3 rounded-lg text-black bg-white focus:outline-none text-sm border-none shadow-inner">

                <button type="submit" class="bg-red-600 px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition text-sm uppercase text-white shadow-lg">
                    {{ $ctaText }}
                </button>
            </form>
        </div>
        <p class="mt-8 text-xs text-gray-400 uppercase tracking-widest font-bold">
            ✔ Free Consultation • ✔ ROI Focused
        </p>
    </div>
</section>

@endsection