<x-app-layout>
    <div class="min-h-screen mt-16">
        <div class="flex flex-col justify-center p-6 lg:p-8 max-w-7xl mx-auto">
            <div class="p-3 border rounded-lg relative">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="photo col-span-1 sm:col-span-1 flex flex-col items-center">
                        <div class="photo-profile mb-3 text-center">
                            <img src="/assets/img/profileimg.webp" class="w-[150px] rounded-full" alt="">
                        </div>
                        <a href="" class="flex w-28 bg-biru text-birumuda text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path
                                        d="M6.63217 9.35637C5.89991 10.0105 4.81087 9.85306 4.11659 9.15878C3.42244 8.46464 3.2651 7.37585 3.91991 6.64448C4.17648 6.35791 4.46266 6.07263 4.77838 5.78878C5.81553 4.8545 7.64619 3.2752 10.2696 1.05087C10.5354 0.825418 10.8762 0.708184 11.2245 0.722456C11.5727 0.736728 11.9028 0.881461 12.1493 1.12791C12.3957 1.37435 12.5405 1.70448 12.5547 2.05272C12.569 2.40095 12.4518 2.74181 12.2263 3.0076C9.99891 5.63565 8.42037 7.46631 7.48919 8.49882C7.20495 8.81406 6.91928 9.09991 6.63217 9.35637ZM0.810014 9.8713C1.4253 9.43065 2.26907 9.49989 2.80431 10.0349L3.239 10.4695C3.77585 11.0061 3.84529 11.8525 3.4031 12.4695C3.21459 12.7326 2.9485 12.93 2.64213 13.0343L2.55325 13.0645C1.10967 13.5557 -0.271993 12.1815 0.211269 10.7353L0.243541 10.6387C0.346819 10.3296 0.545072 10.061 0.810014 9.8713Z"
                                        fill="#D9F4FF" />
                                </svg>
                            Edit Profile
                        </a>
                    </div>
                    <div class="data col-span-1 sm:col-span-2 flex flex-col justify-center mt-3">
                        <h5 class="text-biru text-3xl">{{ $user->name }}</h5>
                        <p class="mt-1">{{ $user->jenis_kelamin }}, {{ $user->usia }} Tahun</p>
                        <table class="mt-3">
                            <tr>
                                <td class="font-light">Email</td>
                                <td class="text-biru">imrona463@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="font-light">Username</td>
                                <td class="text-biru">ali</td>
                            </tr>
                            <tr>
                                <td class="font-light">Tinggi</td>
                                <td class="text-biru">160 cm</td>
                            </tr>
                            <tr>
                                <td class="font-light">Berat</td>
                                <td class="text-biru">45 kg</td>
                            </tr>
                            <tr>
                                <td class="font-light">Tanggal lahir</td>
                                <td class="text-biru">2004-08-12</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>