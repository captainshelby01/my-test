<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'FDP Digitals')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        /* Senior Dev Scrollbar Polish */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #000; }
        ::-webkit-scrollbar-thumb { background: #dc2626; }
    </style>
</head>
<body class="antialiased bg-zinc-50 text-black selection:bg-red-600 selection:text-white overflow-x-hidden">

    @if(request()->is('admin*'))
        {{-- Custom Admin Banner --}}
        <div class="bg-red-600 text-white text-[10px] font-black uppercase tracking-[0.2em] py-2 px-6 flex justify-between items-center sticky top-0 z-[60]">
            <div class="flex items-center">
                <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse mr-2"></span>
                System Authorized: Admin Access
            </div>
            <span class="hidden md:inline italic text-[8px] opacity-70">Secured Node: {{ request()->ip() }}</span>
        </div>
    @else
        {{-- Public Navbar --}}
        <nav class="bg-black text-white py-6 px-6 sticky top-0 z-50 shadow-2xl backdrop-blur-md bg-black/95 border-b border-white/5">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter italic uppercase group">
                    FDP <span class="text-red-600 group-hover:text-white transition">DIGITALS</span>
                </a>
                
                <div class="hidden md:flex space-x-10 font-bold text-[11px] uppercase tracking-[0.15em]">
                    <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'text-red-600' : 'text-zinc-400 hover:text-white' }} transition">Home</a>
                    <a href="{{ route('services') }}" class="{{ request()->is('services') ? 'text-red-600' : 'text-zinc-400 hover:text-white' }} transition">Services</a>
                    <a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'text-red-600' : 'text-zinc-400 hover:text-white' }} transition">Contact</a>
                </div>

                <a href="{{ route('contact') }}" class="bg-red-600 px-7 py-3 rounded-full font-bold text-[10px] uppercase tracking-widest hover:bg-white hover:text-red-600 transition-all duration-300 shadow-lg shadow-red-600/20">
                    Get Started
                </a>
            </div>
        </nav>
    @endif

    <main>
        @yield('content')
        
        @if(isset($slot))
            <div class="py-12 flex justify-center bg-zinc-100 min-h-screen">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </div>
        @endif
    </main>

    {{-- WhatsApp Button --}}
    <a href="https://wa.me/2349058039503" target="_blank" class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform group">
        <span class="absolute right-full mr-4 bg-black text-white text-[10px] font-black uppercase tracking-widest py-2 px-4 rounded border-l-2 border-red-600 opacity-0 group-hover:opacity-100 transition-all whitespace-nowrap">Chat With Us</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.06 3.973L0 16l4.14-1.086c1.158.633 2.457.969 3.783.969h.004c4.368 0 7.926-3.558 7.93-7.926a7.855 7.855 0 0 0-2.257-5.619zM7.994 14.52a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
    </a>

</body>
</html>