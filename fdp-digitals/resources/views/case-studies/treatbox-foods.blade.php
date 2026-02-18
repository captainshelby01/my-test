@extends('layouts.app')

@section('title', 'TreatBox Foods Case Study | FDP Digitals')
@section('meta_description', 'TreatBox Foods case study: startup growth, visibility, and sales improvement.')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative bg-gray-900 py-24 text-white overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/treatbox-foods.jpg') }}" 
             onerror="this.src='https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1600'"
             class="w-full h-full object-cover opacity-30" 
             alt="TreatBox Foods Background">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-3 mb-6">
            <span class="h-px w-8 bg-red-600"></span>
            <span class="text-red-500 text-[11px] font-black uppercase tracking-[0.3em] leading-none">Startup Growth Case Study</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">TreatBox <span class="text-red-600">Foods</span></h1>
        <p class="text-xl text-gray-300 max-w-2xl leading-relaxed">Scaling a food startup through aggressive social commerce and performance-driven visibility strategies.</p>
    </div>
</section>

{{-- ================= RESULTS BAR ================= --}}
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h5 class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-1">Industry</h5>
                <p class="text-gray-900 font-bold">Food & Beverage</p>
            </div>
            <div>
                <h5 class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-1">Focus</h5>
                <p class="text-gray-900 font-bold">Sales & Visibility</p>
            </div>
            <div>
                <h5 class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-1">Channel</h5>
                <p class="text-gray-900 font-bold">Social Commerce</p>
            </div>
            <div>
                <h5 class="text-gray-400 text-[10px] uppercase font-bold tracking-widest mb-1">Growth</h5>
                <p class="text-red-600 font-black text-xl">+45% Sales</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= CONTENT SECTION ================= --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-4 bg-red-100 rounded-3xl -rotate-2 group-hover:rotate-0 transition duration-500"></div>
                <img src="{{ asset('images/treatbox-foods-main.jpg') }}" 
                     onerror="this.src='https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=800'"
                     class="relative rounded-2xl shadow-2xl w-full h-[450px] object-cover" 
                     alt="TreatBox Foods Project">
            </div>

            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">The Challenge</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">TreatBox Foods had a product that people loved, but their digital footprint was inconsistent. Customer acquisition was relying purely on word-of-mouth.</p>

                <h3 class="text-2xl font-bold text-gray-900 mb-4">The FDP Strategy</h3>
                <div class="space-y-4 mb-10 text-gray-600">
                    <p>✓ Automated social media funnels to turn likes into orders.</p>
                    <p>✓ Localized SEO to capture "food near me" search traffic.</p>
                    <p>✓ High-conversion checkout optimization for the website.</p>
                </div>

                <a href="{{ route('home') }}" class="text-red-600 font-bold hover:underline">← Back to Portfolio</a>
            </div>
        </div>
    </div>
</section>

{{-- ================= FINAL CTA SECTION ================= --}}
<section class="bg-red-600 py-16 text-center text-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-black mb-6">Ready to grow your brand?</h2>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-red-600 px-10 py-4 rounded-full font-black uppercase tracking-widest hover:bg-gray-100 transition shadow-xl">Get Started with FDP</a>
    </div>
</section>
@endsection