@extends('layouts.app')

@section('content')
<section class="bg-light py-24">
    <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center gap-12">

        {{-- Text Column --}}
        <div class="lg:w-1/2">
            <h3 class="text-4xl font-extrabold mb-6">
                About <span class="text-primary">FDP Digitals</span>
            </h3>

            <p class="text-gray-700 mb-6">
                At FDP Digitals, we don’t just market — we drive results.
                From strategy to execution, every action is designed
                to increase visibility, growth, and measurable returns
                for SMEs, startups, and corporates.
            </p>

            <ul class="space-y-3 text-gray-700">
                <li>✅ Tailored marketing strategies for every client</li>
                <li>✅ Creative advertising & branding solutions</li>
                <li>✅ Data-driven social media campaigns</li>
                <li>✅ Modern web and SEO solutions</li>
            </ul>
        </div>

        {{-- Image Column --}}
        <div class="lg:w-1/2 relative">
            <img src="{{ asset('images/about.png') }}" 
                 alt="FDP Digitals Team" 
                 class="rounded-xl shadow-lg w-full">
            <div class="absolute inset-0 bg-primary opacity-20 rounded-xl"></div>
        </div>

    </div>
</section>
@endsection
