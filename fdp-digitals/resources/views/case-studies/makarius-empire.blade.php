@extends('layouts.app')

@section('title', 'Makarius Empire Case Study | FDP Digitals')

@section('content')

{{-- Hero with Overlay --}}
<section class="relative h-[60vh] flex items-center bg-gray-900 overflow-hidden">
    <img src="{{ asset('images/makarius-empire.jpg') }}" 
         onerror="this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1600'" 
         class="absolute inset-0 w-full h-full object-cover opacity-40">
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-white">
        <span class="text-red-600 font-bold uppercase tracking-widest text-xs">Branding & Identity</span>
        <h1 class="text-5xl md:text-7xl font-extrabold mt-4">Makarius <span class="text-red-600">Empire</span></h1>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6 text-gray-900">Refining Corporate Excellence</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">Makarius Empire required a visual language that spoke to high-level stakeholders. FDP Digitals built a "Power Brand" identity.</p>
                
                <div class="grid md:grid-cols-2 gap-8 mt-12">
                    <div class="p-8 bg-gray-50 rounded-xl border border-gray-100">
                        <h4 class="font-bold text-red-600 mb-2">The Challenge</h4>
                        <p class="text-sm text-gray-600 italic">"Inconsistent messaging across platforms was diluting the company's authority."</p>
                    </div>
                    <div class="p-8 bg-gray-50 rounded-xl border border-gray-100">
                        <h4 class="font-bold text-red-600 mb-2">The Result</h4>
                        <p class="text-gray-900 font-black uppercase text-2xl">+120% Brand Recall</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 p-8 rounded-2xl text-white self-start shadow-xl">
                <h4 class="text-xl font-bold mb-6">Core Delivery</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="pb-4 border-b border-gray-800">● Logo & Visual System</li>
                    <li class="pb-4 border-b border-gray-800">● Tone of Voice Guidelines</li>
                    <li class="pb-4 border-b border-gray-800">● Corporate Stationery</li>
                    <li>● Digital Market Positioning</li>
                </ul>
                {{-- Updated Link --}}
                <a href="{{ url('/#work') }}" class="mt-8 block text-center bg-red-600 py-3 rounded-lg font-bold hover:bg-red-700 transition">← Back to Portfolio</a>
            </div>
        </div>
    </div>
</section>

{{-- ================= FINAL CTA SECTION ================= --}}
<section class="bg-red-600 py-16 text-center text-white">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-black mb-6">Ready for a rebrand?</h2>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-red-600 px-10 py-4 rounded-full font-black uppercase tracking-widest hover:bg-gray-100 transition shadow-xl">Start Your Project</a>
    </div>
</section>
@endsection