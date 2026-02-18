<x-guest-layout>
    <div class="mb-6 text-[11px] font-bold uppercase tracking-widest text-zinc-400 leading-relaxed">
        {{ __('Forgot your password? No problem. Enter your email and we will send a secure reset link.') }}
    </div>

    <x-auth-session-status class="mb-4 p-3 bg-red-600/10 border border-red-600 text-red-600 text-[10px] font-black uppercase tracking-widest" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white font-black uppercase text-[10px] tracking-widest" />
            <x-text-input id="email" class="block mt-2 w-full bg-white text-black p-3 rounded-none border-0 focus:ring-2 focus:ring-red-600" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="flex items-center justify-end mt-8">
            <button class="w-full bg-red-600 text-white py-4 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-white hover:text-red-600 transition duration-300">
                {{ __('Send Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>