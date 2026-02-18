<x-guest-layout>
    <div class="mb-8 border-b border-white/10 pb-4">
        <h2 class="text-white font-black uppercase italic tracking-tighter text-xl">Reset <span class="text-red-600">Password</span></h2>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" :value="__('Confirm Email')" class="text-white font-black uppercase text-[10px] tracking-widest" />
            <x-text-input id="email" class="block mt-2 w-full bg-white text-black p-3 rounded-none border-0" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="mt-6">
            <x-input-label for="password" :value="__('New Password')" class="text-white font-black uppercase text-[10px] tracking-widest" />
            <x-text-input id="password" class="block mt-2 w-full bg-white text-black p-3 rounded-none border-0" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="mt-6">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="text-white font-black uppercase text-[10px] tracking-widest" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full bg-white text-black p-3 rounded-none border-0" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-[9px] font-bold uppercase" />
        </div>

        <div class="flex items-center justify-end mt-10">
            <button class="w-full bg-red-600 text-white py-4 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-white hover:text-red-600 transition duration-300">
                {{ __('Update Credentials') }}
            </button>
        </div>
    </form>
</x-guest-layout>