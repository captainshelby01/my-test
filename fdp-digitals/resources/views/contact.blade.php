@extends('layouts.app')

@section('content')

{{-- HERO / INTRO --}}
<section class="max-w-7xl mx-auto px-6 py-20">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
        Let’s Start Something <span class="text-primary">Great</span>
    </h1>

    <p class="text-lg max-w-2xl text-gray-600">
        Have a project in mind or need help growing your brand?
        Tell us about it and we’ll get back to you shortly.
    </p>
</section>

{{-- CONTACT SECTION --}}
<section class="max-w-7xl mx-auto px-6 pb-24 grid grid-cols-1 md:grid-cols-2 gap-16">

    {{-- LEFT: CONTACT INFO --}}
    <div>
        <h2 class="text-2xl font-semibold mb-6">Contact Information</h2>

        <ul class="space-y-4 text-lg">
            <li>
                <span class="font-medium text-dark">Email:</span>
                <br>
                <a href="mailto:fdpdigitals@gmail.com" class="text-primary hover:underline">
                    fdpdigitals@gmail.com
                </a>
            </li>

            <li>
                <span class="font-medium text-dark">Phone:</span>
                <br>
                <a href="tel:+2349073089827" class="hover:underline">
                    +234 907 308 9827
                </a>
            </li>

            <li>
                <span class="font-medium text-dark">Location:</span>
                <br>
                Lagos, Nigeria
            </li>
        </ul>

        <p class="mt-8 text-gray-600 max-w-md">
            We work with startups, SMEs, and corporates across multiple industries,
            delivering strategy-driven digital solutions.
        </p>

        {{-- WHATSAPP --}}
        <div class="mt-10 p-8 bg-green-50 border border-green-200 rounded-lg">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Chat with us instantly</h3>
            <p class="text-sm text-gray-600 mb-4">Prefer WhatsApp? Click the button below to start a conversation.</p>
            <a href="https://wa.me/2349073089827?text=Hi%20FDP%20Digitals,%20I'd%20like%20to%20discuss%20a%20project." 
               target="_blank"
               class="inline-block bg-[#25D366] text-white px-8 py-3 rounded-md font-semibold hover:opacity-90 transition">
                Chat on WhatsApp
            </a>
        </div>
    </div>

    {{-- RIGHT: CONTACT FORM --}}
    <div class="bg-light p-8 rounded-lg">
        <h2 class="text-2xl font-semibold mb-6">Send Us a Message</h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md font-bold">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 font-medium">Full Name</label>
                <input type="text" name="name" required
                    class="w-full border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            </div>

            <div>
                <label class="block mb-2 font-medium">Email Address</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            </div>

            <div>
                <label class="block mb-2 font-medium">Service Needed</label>
                <select name="service"
                    class="w-full border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    <option> Digital Marketing & Advertising</option>
                    <option>Branding</option>
                    <option>Social Media Management</option>
                    <option>Web Design & Development</option>
                    <option>SEO</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 font-medium">Message</label>
                <textarea name="message" rows="4" required
                    class="w-full border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
            </div>

            <button type="submit"
                class="bg-primary text-white px-8 py-3 rounded-md font-semibold hover:opacity-90 transition">
                Send Message
            </button>
        </form>
    </div>

</section>

@endsection