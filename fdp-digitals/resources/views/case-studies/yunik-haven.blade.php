@extends('layouts.app')

@section('title', 'Yunik Haven Case Study | FDP Digitals')
@section('meta_description', 'Learn how FDP Digitals helped Yunik Haven increase engagement and leads.')

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-gray-900 py-24 text-white">
    <div class="absolute inset-0">
        <img src="{{ asset('images/yunik-haven.jpg') }}" 
             onerror="this.src='https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=1600'"
             class="w-full h-full object-cover opacity-20" alt="Yunik Haven">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-3 mb-4">
            <span class="h-px w-8 bg-red-600"></span>
            <span class="text-red-500 text-[11px] font-black uppercase tracking-[0.3em]">Real Estate Marketing</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">Yunik <span class="text-red-600">Haven</span></h1>
        <p class="text-xl text-gray-400 max-w-2xl leading-relaxed">Driving premium property inquiries through high-intent digital funnels.</p>
    </div>
</section>

{{-- ================= OVERVIEW BARS ================= --}}
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div><h5 class="text-gray-400 text-[10px] font-bold uppercase mb-1">Industry</h5><p class="font-bold">Real Estate</p></div>
            <div><h5 class="text-gray-400 text-[10px] font-bold uppercase mb-1">Service</h5><p class="font-bold">Lead Gen & Social</p></div>
            <div><h5 class="text-gray-400 text-[10px] font-bold uppercase mb-1">Timeline</h5><p class="font-bold">6 Weeks</p></div>
            <div><h5 class="text-gray-400 text-[10px] font-bold uppercase mb-1">Growth</h5><p class="text-red-600 font-black text-xl">+45% Inquiries</p></div>
        </div>
    </div>
</section>

{{-- ================= THE STORY ================= --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-start">
        <div>
            <h3 class="text-2xl font-bold mb-4 italic border-l-4 border-red-600 pl-4">The Challenge</h3>
            <p class="text-gray-600 text-lg leading-relaxed mb-8">Yunik Haven had stunning projects but lacked a system to capture high-value leads. Their digital presence was static.</p>
            
            <h3 class="text-2xl font-bold mb-4 italic border-l-4 border-red-600 pl-4">The Solution</h3>
            <ul class="space-y-3 text-gray-700">
                <li><span class="text-red-600 font-bold">✓</span> Targeted Meta ads for High Net Worth Individuals.</li>
                <li><span class="text-red-600 font-bold">✓</span> Lead-capture landing page optimization.</li>
                <li><span class="text-red-600 font-bold">✓</span> Real-time inquiry tracking dashboards.</li>
            </ul>
        </div>

        <div class="relative">
            <img src="{{ asset('images/yunik-haven-analytics.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1551288049-bbbda536339a?auto=format&fit=crop&q=80&w=800'" class="rounded-2xl shadow-2xl w-full">
            <div class="absolute -bottom-6 -left-6 bg-red-600 text-white p-8 rounded-2xl hidden md:block shadow-xl">
                <div class="text-4xl font-black">45%</div>
                <div class="text-xs uppercase tracking-widest opacity-80">Increase in leads</div>
            </div>
        </div>
    </div>
</section>

{{-- ================= FINAL CTA SECTION ================= --}}
<section class="bg-gray-900 py-16 text-center text-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-black mb-6">Drive more sales today</h2>
        <a href="{{ route('contact') }}" class="inline-block bg-red-600 text-white px-10 py-4 rounded-full font-black uppercase tracking-widest hover:bg-red-700 transition shadow-xl">Book a Strategy Session</a>
    </div>
</section>
@endsection