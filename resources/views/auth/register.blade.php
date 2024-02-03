<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Nama anda" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="you@example.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="jenis_kelamin" value="old('jenis_kelamin')" required autofocus autocomplete="name" >
                <option value="" disabled selected hidden>Pilih jenis kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="mt-4">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal lahir')" />
            <input type="date" id="tanggal_lahir" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="tanggal_lahir" value="old('tanggal_lahir')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <!-- TB BB -->
        <div class="flex mt-4">
            <div class="w-1/2 me-2">
                <x-input-label for="tinggi_badan" :value="__('Tinggi Badan')" />
                <input type="number" id="tinggi_badan" placeholder="cm" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="tinggi_badan" value="old('tinggi_badan')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('tinggi_badan')" class="mt-2" />
            </div>
            <div class="w-1/2 ms-2">
                <x-input-label for="berat_badan" :value="__('Berat Badan')" />
                <input type="number" id="berat_badan" placeholder="kg" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="berat_badan" value="old('berat_badan')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('berat_badan')" class="mt-2" />
            </div>
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="aktivitas" :value="__('Level Aktivitas')" />
            <select id="aktivitas" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="aktivitas" value="old('aktivitas')" required autofocus autocomplete="name" >
                <option value="" disabled selected hidden>Pilih level aktivitas</option>
                <option value="1.2">Tidak aktif (tidak berolahraga sama sekali)</option>
                <option value="1.375">Cukup aktif (berolahraga 1-3x seminggu)</option>
                <option value="1.55">Aktif (berolahraga 3-5x seminggu)</option>
                <option value="1.725">Sangat aktif (berolahraga atau 6-7x seminggu)</option>
            </select>
            <x-input-error :messages="$errors->get('aktivitas')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Masukan password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmas Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="Masukan ulang password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button type="submit" class="py-2 rounded-md w-full text-center bg-biru text-birumuda">
                {{ __('Register') }}
            </button>
        </div>

        <p class="mt-3">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-biru">Masuk</a></p>
    </form>
</x-guest-layout>
