<x-admin-layout>
    <div class="flex flex-wrap justify-between mb-3">
        <h1 class="text-biru font-bold text-4xl">
            Users
        </h1>
        <form action="" class="bg-birumuda flex rounded-lg w-full md:w-60">
            <input type="text" id="name" placeholder="Cari nama" class="border-0 mt-1 w-full border-0 focus:border-0 focus:ring-0 bg-transparent h-8 mt-0" type="text" name="search" value="{{ old('search') }}" required autocomplete="search"/>
            <button type="submit" class="p-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
              </svg>
            </button>
        </form>
    </div>
    <div class="relative overflow-x-scroll shadow-md sm:rounded-lg mb-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bergabung
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Verivikasi
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = $users->firstItem();
                @endphp
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $i }}
                    </th>
                    <td class="px-6 py-4 flex justify-center">
                        <img src="{{ $user->gambar ?? "/assets/img/profileimg.webp"}}" alt="" class="w-8 rounded-full">
                    </td>
                    <th class="px-6 py-4">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->created_at }}
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                        @if ($user->email_verified_at)
                        <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/>
                        </svg>
                        @else
                        <svg class="w-6 h-6 text-merah dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6m0 12L6 6"/>
                        </svg>
                        @endif
                    </td>
                </tr>
                @php
                    $i++
                @endphp
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</x-admin-layout>