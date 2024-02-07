<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informasi Profile') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Ubah data akun profile dan alamat email anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="/email/verification-notification">
        @csrf
    </form>

    <form method="post" action="/profile" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Alamat email anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Link verifikasi baru telah dikirim ke alamat email anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="jenis_kelamin" value="old('jenis_kelamin')" required autofocus autocomplete="name" >
                <option value="" disabled selected hidden>Pilih jenis kelamin</option>
                <option value="Laki-laki" {{ $user->jenis_kelamin == "Laki-laki" ? "selected" : "" }}>Laki-laki</option>
                <option value="Perempuan" {{ $user->jenis_kelamin == "Perempuan" ? "selected" : "" }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tanggal_lahir" :value="__('Tanggal lahir')" />
            <input type="date" id="tanggal_lahir" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="aktivitas" :value="__('Level Aktivitas')" />
            <select id="aktivitas" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-birumuda dark:focus:border-indigo-600 focus:ring-birumuda dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" name="aktivitas" value="old('aktivitas')" required autofocus autocomplete="name" >
                <option value="1.2" {{ $user->aktivitas == 1.2 ? "selected" : "" }}>Tidak aktif (tidak berolahraga sama sekali)</option>
                <option value="1.375" {{ $user->aktivitas == 1.375 ? "selected" : "" }}>Cukup aktif (berolahraga 1-3x seminggu)</option>
                <option value="1.55" {{ $user->aktivitas == 1.55 ? "selected" : "" }}>Aktif (berolahraga 3-5x seminggu)</option>
                <option value="1.725" {{ $user->aktivitas == 1.725 ? "selected" : "" }}>Sangat aktif (berolahraga atau 6-7x seminggu)</option>
            </select>
            <x-input-error :messages="$errors->get('aktivitas')" class="mt-2" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
