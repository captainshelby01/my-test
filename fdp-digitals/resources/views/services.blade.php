@extends('layouts.app')

@section('content')
<section class="bg-light py-24">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold mb-4">
                Our <span class="text-primary">Services</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                We provide end-to-end digital solutions designed to grow visibility,
                engagement, and revenue.
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Card 1 --}}
            <div class="border rounded-xl p-8 hover:shadow-xl transition group">
                <div class="text-primary text-4xl mb-4">📈</div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary">
                    Marketing Strategy
                </h4>
                <p class="text-gray-600 text-sm">
                    Data-driven marketing plans tailored to your brand, audience, and growth goals.
                </p>
            </div>

            {{-- Card 2 --}}
            <div class="border rounded-xl p-8 hover:shadow-xl transition group">
                <div class="text-primary text-4xl mb-4">📢</div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary">
                    Advertising & Media
                </h4>
                <p class="text-gray-600 text-sm">
                    High-impact ads across digital platforms that convert attention into action.
                </p>
            </div>

            {{-- Card 3 --}}
            <div class="border rounded-xl p-8 hover:shadow-xl transition group">
                <div class="text-primary text-4xl mb-4">💻</div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary">
                    Web & SEO
                </h4>
                <p class="text-gray-600 text-sm">
                    Modern websites and SEO strategies that improve rankings, traffic, and credibility.
                </p>
            </div>

            {{-- Card 4 --}}
            <div class="border rounded-xl p-8 hover:shadow-xl transition group">
                <div class="text-primary text-4xl mb-4">📱</div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary">
                    Social & Branding
                </h4>
                <p class="text-gray-600 text-sm">
                    Strong brand identity and social media presence that builds trust and loyalty.
                </p>
            </div>

            {{-- Card 5: Digital Skills Training --}}
            <div class="border rounded-xl p-8 hover:shadow-xl transition group">
                <div class="text-primary text-4xl mb-4">🎓</div>
                <h4 class="text-xl font-bold mb-3 group-hover:text-primary">
                    Digital Skills Training
                </h4>
                <p class="text-gray-600 text-sm">
                    Become a Digital Skills Professional with FDP Digitals and upgrade your expertise.
                </p>
            </div>

        </div>
    </div>
</section>
@endsection
