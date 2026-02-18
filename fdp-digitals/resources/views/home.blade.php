@extends('layouts.app')

@section('title', 'FDP Digitals | Results-Driven Digital Marketing')
@section('meta_description', 'Marketing, advertising, branding, SEO and social media solutions for businesses.')

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative bg-center bg-cover bg-no-repeat" style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); background-color: #1a1a1a;">
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-red-900/40 to-black/80"></div>

    <div class="relative max-w-7xl mx-auto px-6 min-h-[85vh] flex flex-col justify-center text-white">
        <h1 class="text-5xl font-bold leading-tight mb-6 tracking-tight">
            We Don’t Just Market,<br>
            <span class="text-red-600">We Drive Results</span>
        </h1>

        <p class="text-lg max-w-2xl mb-10 text-gray-200">
            Marketing, branding, advertising, social media, web, and SEO
            solutions for SMEs, startups, and corporates.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('contact') }}" class="bg-red-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-red-600 transition duration-300">
                Get Started
            </a>

            <a href="{{ route('services') }}" class="border border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-black transition duration-300">
                Our Services
            </a>
        </div>
    </div>
</section>

{{-- ================= SERVICES ================= --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">
                Our <span class="text-red-600">Services</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                End-to-end digital solutions built for visibility, growth and revenue.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="border border-gray-100 rounded-3xl p-8 hover:shadow-xl transition duration-300 bg-gray-50/50">
                <div class="text-red-600 text-4xl mb-4">📈</div>
                <h4 class="text-xl font-bold mb-3">Marketing Strategy</h4>
                <p class="text-gray-600 text-sm">Data-driven strategies aligned with your business goals.</p>
            </div>
            <div class="border border-gray-100 rounded-3xl p-8 hover:shadow-xl transition duration-300 bg-gray-50/50">
                <div class="text-red-600 text-4xl mb-4">📢</div>
                <h4 class="text-xl font-bold mb-3">Advertising & Media</h4>
                <p class="text-gray-600 text-sm">High-impact campaigns that convert attention into action.</p>
            </div>
            <div class="border border-gray-100 rounded-3xl p-8 hover:shadow-xl transition duration-300 bg-gray-50/50">
                <div class="text-red-600 text-4xl mb-4">💻</div>
                <h4 class="text-xl font-bold mb-3">Web & SEO</h4>
                <p class="text-gray-600 text-sm">SEO-optimized websites that drive traffic and trust.</p>
            </div>
            <div class="border border-gray-100 rounded-3xl p-8 hover:shadow-xl transition duration-300 bg-gray-50/50">
                <div class="text-red-600 text-4xl mb-4">📱</div>
                <h4 class="text-xl font-bold mb-3">Social & Branding</h4>
                <p class="text-gray-600 text-sm">Brand identities and social presence that build loyalty.</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= ABOUT ================= --}}
<section class="bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-4xl font-bold mb-6">
                About <span class="text-red-600">FDP Digitals</span>
            </h2>
            <p class="text-gray-700 mb-6">
                We partner with brands to create marketing systems that drive measurable results.
                Every strategy is intentional, every campaign is performance-focused.
            </p>

            <ul class="space-y-3 text-gray-700">
                <li><span class="text-red-600 mr-2">✅</span> Strategy-led execution</li>
                <li><span class="text-red-600 mr-2">✅</span> Creative & performance marketing</li>
                <li><span class="text-red-600 mr-2">✅</span> Analytics & reporting</li>
                <li><span class="text-red-600 mr-2">✅</span> Digital skills training</li>
            </ul>
        </div>

        <div class="relative">
            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80&w=800" class="rounded-3xl shadow-lg w-full h-auto" alt="FDP Digitals Team">
        </div>
    </div>
</section>

{{-- ================= OUR WORK / CASE STUDIES ================= --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <p class="text-sm uppercase tracking-widest text-red-600 text-center mb-3 font-bold">Selected Case Studies</p>
        <h2 class="text-4xl font-bold text-center mb-14">Our <span class="text-red-600">Work</span></h2>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Case 1: Yunik Haven --}}
            <div class="relative overflow-hidden rounded-3xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=800" class="w-full h-72 object-cover group-hover:scale-110 transition duration-500" alt="Yunik Haven Project">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-xs uppercase mb-2 text-red-600 font-bold">Digital Marketing</span>
                    <h4 class="text-xl font-bold mb-1">Yunik Haven</h4>
                    <p class="text-sm mb-1 text-gray-200">Lead generation & engagement growth.</p>
                    <span class="text-xs bg-red-600/20 text-red-400 px-2 py-1 rounded-full inline-block mb-2 w-fit">+65% inquiries</span>
                    <a href="{{ route('case-study.yunik-haven') }}" class="text-sm font-semibold underline hover:text-red-600 transition">View Case Study →</a>
                </div>
            </div>

            {{-- Case 2: Makarius Empire --}}
            <div class="relative overflow-hidden rounded-3xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&q=80&w=800" class="w-full h-72 object-cover group-hover:scale-110 transition duration-500" alt="Makarius Empire Project">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-xs uppercase mb-2 text-red-600 font-bold">Branding</span>
                    <h4 class="text-xl font-bold mb-1">Makarius Empire</h4>
                    <p class="text-sm mb-1 text-gray-200">Brand identity & market positioning.</p>
                    <span class="text-xs bg-red-600/20 text-red-400 px-2 py-1 rounded-full inline-block mb-2 w-fit">+120% brand recall</span>
                    <a href="{{ route('case-study.makarius-empire') }}" class="text-sm font-semibold underline hover:text-red-600 transition">View Case Study →</a>
                </div>
            </div>

            {{-- Case 3: TreatBox Foods --}}
            <div class="relative overflow-hidden rounded-3xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=800" class="w-full h-72 object-cover group-hover:scale-110 transition duration-500" alt="TreatBox Foods Project">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-xs uppercase mb-2 text-red-600 font-bold">Startup Growth</span>
                    <h4 class="text-xl font-bold mb-1">TreatBox Foods</h4>
                    <p class="text-sm mb-1 text-gray-200">Visibility, structure & sales growth.</p>
                    <span class="text-xs bg-red-600/20 text-red-400 px-2 py-1 rounded-full inline-block mb-2 w-fit">+45% sales growth</span>
                    <a href="{{ route('case-study.treatbox-foods') }}" class="text-sm font-semibold underline hover:text-red-600 transition">View Case Study →</a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= METRICS / STATS SECTION ================= --}}
<section class="bg-black py-20">
    <div class="max-w-7xl mx-auto px-6 text-center lg:text-left">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="flex flex-col items-center">
                <div class="text-3xl mb-4">🚀</div>
                <h3 class="text-4xl font-bold text-white mb-2">100+</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Projects Completed</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl mb-4">📈</div>
                <h3 class="text-4xl font-bold text-red-600 mb-2">65%</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Avg. Lead Growth</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl mb-4">🤝</div>
                <h3 class="text-4xl font-bold text-white mb-2">50+</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Happy Clients</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl mb-4">🎧</div>
                <h3 class="text-4xl font-bold text-white mb-2">24/7</h3>
                <p class="text-gray-400 text-xs uppercase tracking-widest font-bold">Priority Support</p>
            </div>
        </div>
    </div>
</section>

{{-- ================= TESTIMONIALS SECTION ================= --}}
<section class="bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">What Our <span class="text-red-600">Clients Say</span></h2>
            <div class="w-20 h-1 bg-red-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            {{-- Testimonial 1 --}}
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 relative">
                <div class="text-red-600 text-6xl absolute top-4 right-8 opacity-10">”</div>
                <p class="text-gray-600 italic mb-8 relative z-10">
                    "FDP Digitals transformed our real estate leads. We saw a 45% jump in qualified inquiries in just two months."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?u=yunik" class="w-12 h-12 rounded-full" alt="Client">
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Marketing Lead</h4>
                        <p class="text-red-600 text-xs font-semibold">Yunik Haven</p>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 relative">
                <div class="text-red-600 text-6xl absolute top-4 right-8 opacity-10">”</div>
                <p class="text-gray-600 italic mb-8 relative z-10">
                    "The branding process for Makarius Empire was seamless. They positioned us perfectly for our target corporate market."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?u=makarius" class="w-12 h-12 rounded-full" alt="Client">
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">CEO</h4>
                        <p class="text-red-600 text-xs font-semibold">Makarius Empire</p>
                    </div>
                </div>
            </div>

            {{-- Testimonial 3 --}}
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 relative">
                <div class="text-red-600 text-6xl absolute top-4 right-8 opacity-10">”</div>
                <p class="text-gray-600 italic mb-8 relative z-10">
                    "Visibility was our biggest hurdle. TreatBox Foods is now a household name in our niche thanks to FDP."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://i.pravatar.cc/150?u=treatbox" class="w-12 h-12 rounded-full" alt="Client">
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm">Founder</h4>
                        <p class="text-red-600 text-xs font-semibold">TreatBox Foods</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection