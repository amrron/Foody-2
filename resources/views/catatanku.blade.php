<x-app-layout>
    <div class="min-h-screen mt-16">
        @if(!$history)
        <div class="max-w-7xl mx-auto p-6 lg:p-8 w-full">
            <h1 class="text-biru text-center text-[40px] font-bold">
                Catatanku
            </h1>
            <div class="flex justify-center mb-2">
                <button data-tooltip-target="tooltip-catatanku" id="tbl-catatanku" class="h-9 w-9 me-1 flex items-center justify-center w-9 h-9 text-xs font-medium text-biru bg-white border border-gray-200 rounded-lg toggle-full-view hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-biru dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-biru">
                    <span class="sr-only">Toggle full view</span>
                    <svg class="text-biru"  width="16" height="16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.1a5 5 0 0 0-4.7 1.4l-6.7 6.6a3 3 0 0 0-.8 1.6l-.7 3.7a3 3 0 0 0 3.5 3.5l3.7-.7a3 3 0 0 0 1.5-.9l4.2-4.2V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M17.4 8a1 1 0 0 1 1.2.3 1 1 0 0 1 0 1.6l-.3.3-1.6-1.5.4-.4.3-.2Zm-2.1 2.1-4.6 4.7-.4 1.9 1.9-.4 4.6-4.7-1.5-1.5ZM17.9 6a3 3 0 0 0-2.2 1L9 13.5a1 1 0 0 0-.2.5L8 17.8a1 1 0 0 0 1.2 1.1l3.7-.7c.2 0 .4-.1.5-.3l6.6-6.6A3 3 0 0 0 18 6Z" clip-rule="evenodd"/>
                    </svg>                    
                </button>
                <div id="tooltip-catatanku" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-biru rounded-lg shadow-sm opacity-0 tooltip dark:bg-biru">
                    Catat makanan
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-doughnat" id="tbl-donat" class="h-9 w-9 ms-1 flex items-center justify-center w-9 h-9 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg toggle-full-view hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-biru dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <span class="sr-only">Toggle full view</span>
                    <svg class="text-biru"  width="16" height="16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.5 2a7 7 0 0 0-.5 0 1 1 0 0 0-1 1v8c0 .6.4 1 1 1h8c.5 0 1-.4 1-1v-.5A8.5 8.5 0 0 0 13.5 2Z"/>
                        <path d="M11 6a1 1 0 0 0-1-1 8.5 8.5 0 1 0 9 9 1 1 0 0 0-1-1h-7V6Z"/>
                    </svg>                    
                </button>
                <div id="tooltip-doughnat" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-biru rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Grafik
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div class="h-[350px] flex items-center">
                <swiper-container class="mySwiper p-0 z-0 w-full" id="open-modal" navigation="true" space-between="20" slides-per-view="auto">
                    <swiper-slide class="w-100 md:w-[320px]">
                        <div class="">
                            <div class="py-4 bg-ping mt-3 mb-3 border-0 rounded-lg">
                                <div class="flex flex-col items-center text-center w-auto">
                                    <img src="/assets/img/morning.svg" class="w-1/2" alt="">
                                    <h5 class="text-biru mb-2 text-4xl font-bold">Pagi</h5>
                                    <p class="card-text mb-2 font-medium">00.00 - 09.00</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-modal-target="modal-pagi" data-modal-toggle="modal-pagi" class=" w-16 bg-biru text-biru hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <x-add-catatan>
                                        </x-add-catatan>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="w-100 md:w-[320px]">
                        <div class="">
                            <div class="py-4 bg-birumuda mt-3 mb-3 border-0 rounded-lg">
                                <div class="flex flex-col items-center text-center w-auto">
                                    <img src="/assets/img/afternoon.svg" class="w-1/2" alt="">
                                    <h5 class="text-biru mb-2 text-4xl font-bold">Siang</h5>
                                    <p class="card-text mb-2 font-medium">10.00 - 14.00</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-modal-target="modal-siang" data-modal-toggle="modal-siang" class=" w-16 bg-biru text-biru hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <x-add-catatan>
                                        </x-add-catatan>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="w-100 md:w-[320px]">
                        <div class="">
                            <div class="py-4 bg-ping mt-3 mb-3 border-0 rounded-lg">
                                <div class="flex flex-col items-center text-center w-auto">
                                    <img src="/assets/img/evening.svg" class="w-1/2" alt="">
                                    <h5 class="text-biru mb-2 text-4xl font-bold">Sore</h5>
                                    <p class="card-text mb-2 font-medium">15.00 - 18.00</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-modal-target="modal-sore" data-modal-toggle="modal-sore" class=" w-16 bg-biru text-biru hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <x-add-catatan>
                                        </x-add-catatan>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide class="w-100 md:w-[320px]">
                        <div class="">
                            <div class="py-4 bg-birumuda mt-3 mb-3 border-0 rounded-lg">
                                <div class="flex flex-col items-center text-center w-auto">
                                    <img src="/assets/img/night.svg" class="w-1/2" alt="">
                                    <h5 class="text-biru mb-2 text-4xl font-bold">Malam</h5>
                                    <p class="card-text mb-2 font-medium">19.00 - 23.00</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-modal-target="modal-malam" data-modal-toggle="modal-malam" class=" w-16 bg-biru text-biru hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <x-add-catatan>
                                        </x-add-catatan>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper-container>
                <swiper-container id="open-donat" pagination="true" class="hidden w-full">
                    <swiper-slide>
                        <div class="bg-white rounded-lg p-4 md:p-6"> 
                            <div class="py-6" id="donut-chart"></div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="flex justify-center items-center">
                            <div class=" w-full">
                                <div class="mb-3">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-biru">Karbohidrat</h5>
                                        <p class="text-biru">{{ auth()->user()->dailyKarbo }}/{{ auth()->user()->batasKarbo }}g</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                        <div class="bg-biru text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round(auth()->user()->dailyKarbo / auth()->user()->batasKarbo * 100) }}%"> {{ round(auth()->user()->dailyKarbo / auth()->user()->batasKarbo * 100) }}%</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-biru">Protein</h5>
                                        <p class="text-biru">{{ auth()->user()->dailyProtein }}/{{ auth()->user()->batasProtein }}g</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                        <div class="bg-birumuda text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round(auth()->user()->dailyProtein / auth()->user()->batasProtein * 100) }}%"> {{ round(auth()->user()->dailyProtein / auth()->user()->batasProtein * 100) }}%</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-biru">Garam</h5>
                                        <p class="text-biru">{{ auth()->user()->dailyGaram }}/{{ auth()->user()->batasGaram }}g</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                        <div class="bg-ping text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round(auth()->user()->dailyGaram / auth()->user()->batasGaram * 100) }}%"> {{ round(auth()->user()->dailyGaram / auth()->user()->batasGaram * 100) }}%</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-biru">Gula</h5>
                                        <p class="text-biru">{{ auth()->user()->dailyGula }}/{{ auth()->user()->batasGula }}g</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                        <div class="bg-black text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ auth()->user()->dailyGula / auth()->user()->batasGula * 100 }}%"> {{ auth()->user()->dailyGula / auth()->user()->batasGula * 100 }}%</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-biru">Lemak</h5>
                                        <p class="text-biru">{{ auth()->user()->dailyLemak }}/{{ auth()->user()->batasLemak }}g</p>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                        <div class="bg-[#6c6a85] text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round(auth()->user()->dailyLemak / auth()->user()->batasLemak * 100) }}%"> {{ round(auth()->user()->dailyLemak / auth()->user()->batasLemak * 100) }}%</div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </swiper-slide>
                </swiper-container>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 w-full">
            @if (!$history)
            <div class="flex mb-5">
                <a href="#" class="flex items-center w-28 bg-biru text-birumuda text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 2.84208L2.10526 3.94734L4.31579 1.73682M1 7.99997L2.10526 9.10524L4.31579 6.89471M1 13.1579L2.10526 14.2631L4.31579 12.0526M6.89474 7.99997H15H6.89474ZM6.89474 13.1579H15H6.89474ZM6.89474 2.84208H15H6.89474Z" fill="#D9F4FF"/>
                        <path d="M1 2.84208L2.10526 3.94734L4.31579 1.73682M1 7.99997L2.10526 9.10524L4.31579 6.89471M1 13.1579L2.10526 14.2631L4.31579 12.0526M6.89474 7.99997H15M6.89474 13.1579H15M6.89474 2.84208H15" stroke="#D9F4FF" stroke-width="1.76471" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="ms-2">
                        Recent
                    </span>
                </a>
                <a href="/catatanku/history" class="flex items-center w-28 bg-birumuda text-biru text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.67607 0.46264C5.41246 0.34537 1.91949 3.77133 1.91949 8.00143H0.420107C0.0431675 8.00143 -0.141114 8.45376 0.126932 8.71343L2.46396 11.0588C2.63149 11.2264 2.89116 11.2264 3.05869 11.0588L5.39571 8.71343C5.45359 8.65438 5.4927 8.57952 5.50811 8.49828C5.52351 8.41704 5.51453 8.33305 5.48228 8.25691C5.45003 8.18077 5.39596 8.11588 5.3269 8.07041C5.25783 8.02495 5.17685 8.00095 5.09416 8.00143H3.59478C3.59478 4.73462 6.25848 2.09605 9.54205 2.13793C12.6581 2.17981 15.2799 4.80163 15.3218 7.91767C15.3637 11.1929 12.7251 13.8649 9.45828 13.8649C8.10968 13.8649 6.86159 13.4042 5.87317 12.6252C5.71273 12.4988 5.51143 12.4358 5.30756 12.4482C5.10369 12.4605 4.91148 12.5474 4.76748 12.6922C4.41567 13.044 4.4408 13.6388 4.83449 13.9403C6.15053 14.9811 7.78046 15.545 9.45828 15.5402C13.6884 15.5402 17.1143 12.0473 16.9971 7.78365C16.8882 3.8551 13.6046 0.571534 9.67607 0.46264ZM9.24887 4.65086C8.90544 4.65086 8.62064 4.93566 8.62064 5.27909V8.36162C8.62064 8.6548 8.77979 8.93122 9.03109 9.08199L11.6445 10.6316C11.9461 10.8075 12.3314 10.707 12.5073 10.4138C12.6832 10.1123 12.5827 9.72698 12.2895 9.55107L9.8771 8.1187V5.27071C9.8771 4.93566 9.59231 4.65086 9.24887 4.65086Z" fill="#131049"/>
                    </svg>   
                    <span class="ms-2">
                        History
                    </span>
                </a>
            </div>
            @else
            <div class="flex mb-5">
                <a href="/catatanku" class="flex items-center w-28 bg-birumuda text-biru text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 2.84208L2.10526 3.94734L4.31579 1.73682M1 7.99997L2.10526 9.10524L4.31579 6.89471M1 13.1579L2.10526 14.2631L4.31579 12.0526M6.89474 7.99997H15H6.89474ZM6.89474 13.1579H15H6.89474ZM6.89474 2.84208H15H6.89474Z" fill="#131049"/>
                        <path d="M1 2.84208L2.10526 3.94734L4.31579 1.73682M1 7.99997L2.10526 9.10524L4.31579 6.89471M1 13.1579L2.10526 14.2631L4.31579 12.0526M6.89474 7.99997H15M6.89474 13.1579H15M6.89474 2.84208H15" stroke="#131049" stroke-width="1.76471" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="ms-2">
                        Recent
                    </span>
                </a>
                <a href="#" class="flex items-center w-28 bg-biru text-birumuda text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.67607 0.46264C5.41246 0.34537 1.91949 3.77133 1.91949 8.00143H0.420107C0.0431675 8.00143 -0.141114 8.45376 0.126932 8.71343L2.46396 11.0588C2.63149 11.2264 2.89116 11.2264 3.05869 11.0588L5.39571 8.71343C5.45359 8.65438 5.4927 8.57952 5.50811 8.49828C5.52351 8.41704 5.51453 8.33305 5.48228 8.25691C5.45003 8.18077 5.39596 8.11588 5.3269 8.07041C5.25783 8.02495 5.17685 8.00095 5.09416 8.00143H3.59478C3.59478 4.73462 6.25848 2.09605 9.54205 2.13793C12.6581 2.17981 15.2799 4.80163 15.3218 7.91767C15.3637 11.1929 12.7251 13.8649 9.45828 13.8649C8.10968 13.8649 6.86159 13.4042 5.87317 12.6252C5.71273 12.4988 5.51143 12.4358 5.30756 12.4482C5.10369 12.4605 4.91148 12.5474 4.76748 12.6922C4.41567 13.044 4.4408 13.6388 4.83449 13.9403C6.15053 14.9811 7.78046 15.545 9.45828 15.5402C13.6884 15.5402 17.1143 12.0473 16.9971 7.78365C16.8882 3.8551 13.6046 0.571534 9.67607 0.46264ZM9.24887 4.65086C8.90544 4.65086 8.62064 4.93566 8.62064 5.27909V8.36162C8.62064 8.6548 8.77979 8.93122 9.03109 9.08199L11.6445 10.6316C11.9461 10.8075 12.3314 10.707 12.5073 10.4138C12.6832 10.1123 12.5827 9.72698 12.2895 9.55107L9.8771 8.1187V5.27071C9.8771 4.93566 9.59231 4.65086 9.24887 4.65086Z" fill="#D9F4FF"/>
                    </svg>   
                    <span class="ms-2">
                        History
                    </span>
                </a>
            </div>
            @endif
            @if(!$history)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5">

                @foreach ($catatans as $catatan)
                <div class="col lg:col-4 col-12-sm container-catatan-makanan">
                    <div class="card card-catatan-makanan rounded-lg p-4 border border-zinc-100">
                        <div class="card-body overflow-hidden relative">
                            <h5 class="card-title text-xl text-biru font-medium">{{ $catatan->makanan->nama }} x {{ $catatan->jumlah }}</h5>
                            <p class="opacity-50">{{ date('H:i', strtotime($catatan->waktu)) }}</p>
                            <a data-modal-target="confirm-modal" data-modal-toggle="confirm-modal" href="/catatanku/delete/{{ $catatan->id }}" class="delete-catatan text-blue-500" style="position: absolute; right: 0px; bottom: 0px; font-size: 20px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#131049" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                </svg>
                            </a>
                            <table>
                                <tr>
                                    <td>Karbohidrat</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->karbohidrat * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->protein * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Garam</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->garam * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Gula</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->gula * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Lemak</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->lemak * $catatan->jumlah }} g</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>  
            @endif          
        
        
        @if($history)
            @foreach ($catatans as $tanggal => $catatanPerTanggal)
            <div class="py-3">
                <div class="border rounded-lg p-2">
                    <div class="flex justify-between items-center text-biru">
                        <p class="m-0 font-semibold">{{ $catatanPerTanggal[0]->hari }}</p>
                        <p class="m-0 font-semibold">{{ $tanggal }}</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5">
                @foreach($catatanPerTanggal as $catatan)
                <div class="col lg:col-4 col-12-sm container-catatan-makanan">
                    <div class="card card-catatan-makanan rounded-lg p-4 border border-zinc-100">
                        <div class="card-body overflow-hidden relative">
                            <h5 class="card-title text-xl text-biru font-medium">{{ $catatan->makanan->nama }} x {{ $catatan->jumlah }}</h5>
                            <p class="opacity-50">{{ date('H:i', strtotime($catatan->waktu)) }}</p>
                            <table>
                                <tr>
                                    <td>Karbohidrat</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->karbohidrat * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Protein</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->protein * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Garam</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->garam * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Gula</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->gula * $catatan->jumlah }} g</td>
                                </tr>
                                <tr>
                                    <td>Lemak</td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $catatan->makanan->lemak * $catatan->jumlah }} g</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
  
<!-- Main modal pagi -->
<div id="modal-pagi" tabindex="-1" aria-hidden="true" class="modal-form transisi  hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-pagi">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-catatanku">
            <x-svg-pagi>
            </x-svg-pagi>
            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Pagi</h3>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-biru dark:text-white">Nama makanan</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan nama makanan" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-biru dark:text-white">Waktu</label>
                    <select id="waktu" name="waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected disabled hidden>Pilih Waktu</option>
                        <option value="00:00">00:00</option>
                        <option value="01:00">01:00</option>
                        <option value="02:00">02:00</option>
                        <option value="03:00">03:00</option>
                        <option value="04:00">04:00</option>
                        <option value="05:00">05:00</option>
                        <option value="06:00">06:00</option>
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-biru dark:text-white">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" required="">
                    </div>
                </div>
                <button type="submit" class="submit-catatanku text-white inline-flex items-center bg-biru hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah catatan
                </button>
            </form>
        </div>
    </div>
</div>   
  
<!-- Main modal siang -->
<div id="modal-siang" tabindex="-1" aria-hidden="true" class="modal-form transisi hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-siang">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-catatanku">
            <x-svg-siang>
            </x-svg-siang>
            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Siang</h3>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-biru dark:text-white">Nama makanan</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan nama makanan" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-biru dark:text-white">Waktu</label>
                    <select id="waktu" name="waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected disabled hidden>Pilih Waktu</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-biru dark:text-white">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-biru hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah catatan
                </button>
            </form>
        </div>
    </div>
</div>  
  
<!-- Main modal sore -->
<div id="modal-sore" tabindex="-1" aria-hidden="true" class="modal-form transisi hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-sore">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-catatanku">
            <x-svg-sore>
            </x-svg-sore>
            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Sore</h3>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-biru dark:text-white">Nama makanan</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan nama makanan" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-biru dark:text-white">Waktu</label>
                    <select id="waktu" name="waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected disabled hidden>Pilih Waktu</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-biru dark:text-white">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-biru hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah catatan
                </button>
            </form>
        </div>
    </div>
</div>   
  
<!-- Main modal malam -->
<div id="modal-malam" tabindex="-1" aria-hidden="true" class="modal-form transisi hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modal-malam">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
            <!-- Modal body -->
            <form class="p-4 md:p-5 form-catatanku">
            <x-svg-malam>
            </x-svg-malam>
            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Malam</h3>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-biru dark:text-white">Nama makanan</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan nama makanan" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                    <label for="waktu" class="block mb-2 text-sm font-medium text-biru dark:text-white">Waktu</label>
                    <select id="waktu" name="waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="" selected disabled hidden>Pilih Waktu</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                        <option value="22:00">22:00</option>
                        <option value="23:00">23:00</option>
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-biru dark:text-white">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-biru hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah catatan
                </button>
            </form>
        </div>
    </div>
</div>   
  
<!-- Modal tunggu sebentar spiner -->
<div id="loading-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
            <div class="p-8 md:p-5 space-y-4">
                <h5 class="text-biru text-4xl font-semibold text-center mb-3">Tunggu sebentar...</h5>
                <h5 class="text-biru text-2xl font-medium text-center mb-3">AI sedang mencari data makanan</h5>
                <div role="status" class="flex justify-center">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
  
<!--- Toas berhasil -->
<div id="toast-success" class="hidden fixed top-20 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal message">Catatan berhasil disimpan.</div>
</div>

<!--- Toas gagal -->
<div id="toast-danger" class="hidden fixed top-20 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal message">Gagal mencatat makanan.</div>
</div>

<!--- Modal delete Confirm --->
<div id="confirm-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-full" style="background-color: rgba(17,24,39,.5);}">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="confirm-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mx-auto mb-3  text-biru w-14 h-14 text-merah bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                <h2 class="font-bold text-biru text-xl mb-3">Apakah anda yakin?</h2>
                <h3 class="mb-5 text-sm font-normal text-biru dark:text-gray-400">Data catatan yang telah dihapus tidak dapat dikembalikan</h3>
                <button data-modal-hide="confirm-modal" type="button" id="confirm-hapus" class="text-white bg-merah hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Ya, Saya yakin
                </button>
                <button data-modal-hide="confirm-modal" type="button" class="text-biru bg-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      const getChartOptions = () => {
          return {
            series: [{{ auth()->user()->dailyKarbo }}, {{ auth()->user()->dailyProtein }}, {{ auth()->user()->DailyGaram }}, {{ auth()->user()->dailyGula }}, {{ auth()->user()->dailyLemak }}],
            colors: ["#131049", "#d9f4ff", "#fdced0", "#111111", "#6c6a85"],
            chart: {
              height: 260,
              width: "100%",
              type: "donut",
            },
            stroke: {
              colors: ["transparent"],
              lineCap: "",
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      show: true,
                      fontFamily: "Inter, sans-serif",
                      offsetY: 20,
                    },
                    total: {
                      showAlways: true,
                      show: true,
                      label: "Total konsumsi",
                      fontFamily: "Inter, sans-serif",
                      formatter: function (w) {
                        var sum = w.globals.seriesTotals.reduce((a, b) => {
                          return a + b
                        }, 0)
                        sum = sum.toFixed(2);
                        return `${sum}g`
                      },
                    },
                    value: {
                      show: true,
                      fontFamily: "Inter, sans-serif",
                      offsetY: -20,
                      formatter: function (value) {
                        return value + "g"
                      },
                    },
                  },
                  size: "80%",
                },
              },
            },
            grid: {
              padding: {
                top: -2,
              },
            },
            labels: ["Karbohidrat", "Protein", "Garam", "Gula", "Lemak"],
            dataLabels: {
              enabled: false,
            },
            legend: {
              position: "bottom",
              fontFamily: "Inter, sans-serif",
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                  return value + "g"
                },
              },
            },
            xaxis: {
              labels: {
                formatter: function (value) {
                  return value  + "g"
                },
              },
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
            },
          }
        }
  
        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts (document.getElementById("donut-chart"), getChartOptions());
          chart.render();
        }
    });
</script>
<script>
    const swiper = document.querySelector('#open-donat');

    const swiperParams = {
    initialSlide: 2,
    slidesPerView: 1,
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
    },
    on: {
      init() {
        
      },
    },
  };

  Object.assign(swiper, swiperParams);

  swiper.initialize();
</script>