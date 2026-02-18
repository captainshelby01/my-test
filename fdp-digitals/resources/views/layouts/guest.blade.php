<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Access | FDP Digitals</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        
        /* Senior Dev Fix: Prevent "Yellow" autofill background in Chrome/Safari */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #000000 !important;
            -webkit-box-shadow: 0 0 0px 1000px #ffffff inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Ensuring inputs remain crisp and visible */
        input {
            color: #000000 !important;
            background-color: #ffffff !important;
        }
        
        /* Styling the Breeze-injected labels if they don't have classes */
        label {
            color: #ffffff !important;
            font-size: 10px !important;
            font-weight: 900 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
        }
    </style>
</head>
<body class="antialiased bg-zinc-50">

    {{-- ================= RESTORED NAVBAR ================= --}}
    <nav class="bg-black text-white py-6 px-10 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter uppercase italic">
                FDP <span class="text-red-600">DIGITALS</span>
            </a>
            
            <div class="hidden md:flex space-x-10">
                <a href="{{ route('home') }}" class="text-[11px] font-black uppercase tracking-[0.25em] text-white hover:text-red-600 transition">Home</a>
                <a href="{{ route('contact') }}" class="text-[11px] font-black uppercase tracking-[0.25em] text-white hover:text-red-600 transition">Contact</a>
            </div>

            <span class="text-[10px] font-black uppercase tracking-widest text-zinc-600">Secure Access</span>
        </div>
    </nav>

    <div class="min-h-[85vh] flex flex-col sm:justify-center items-center pt-12 sm:pt-0 bg-white">
        <div class="mb-8">
            <a href="/" class="text-3xl font-black tracking-tighter italic uppercase text-black">
                FDP <span class="text-red-600">ADMIN</span>
            </a>
        </div>

        {{-- The Black Box --}}
        <div class="w-full sm:max-w-md px-10 py-12 bg-black text-white shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden sm:rounded-none border-t-8 border-red-600">
            {{-- This is where the login form from Breeze sits --}}
            <div class="text-zinc-400">
                {{ $slot }}
            </div>
        </div>
        
        <p class="mt-8 text-[10px] font-bold text-zinc-400 uppercase tracking-widest">
            Authorization Required
        </p>
    </div>

    {{-- ================= RESTORED FOOTER ================= --}}
    <footer class="bg-black text-white py-12 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-10 text-center">
            <div class="w-10 h-1 bg-red-600 mx-auto mb-6"></div>
            <p class="text-zinc-500 text-[10px] font-bold uppercase tracking-[0.4em]">
                &copy; 2026 FDP Digitals. Secure Administrator Portal.
            </p>
        </div>
    </footer>

</body>
</html>