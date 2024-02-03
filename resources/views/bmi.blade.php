<x-app-layout>
    <div class="min-h-screen mt-16">
        @if (!$history)            
        <div class="flex flex-col justify-center p-6 lg:p-8 max-w-7xl mx-auto">
            <h1 class="text-biru text-center text-[40px] font-bold">
                BMI
            </h1>
            <div class="flex justify-center">
                <button data-tooltip-target="tooltip-calculator" id="tbl-kalkulator" class="h-9 w-9 me-1 flex items-center justify-center w-9 h-9 text-xs font-medium text-biru bg-white border border-gray-200 rounded-lg toggle-full-view hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-biru dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-biru">
                    <span class="sr-only">Toggle full view</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator-fill" viewBox="0 0 16 16">
                        <path class="bg-biru" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5m0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5z"/>
                    </svg>
                </button>
                <div id="tooltip-calculator" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-biru rounded-lg shadow-sm opacity-0 tooltip dark:bg-biru">
                    Kalkulator BMI
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-chart" id="tbl-chart" class="h-9 w-9 ms-1 flex items-center justify-center w-9 h-9 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg toggle-full-view hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-biru dark:focus:ring-gray-500 dark:bg-gray-800 focus:outline-none dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <span class="sr-only">Toggle full view</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                        <path class="bg-biru" d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                    </svg>
                </button>
                <div id="tooltip-chart" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-biru rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Grafik
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div class="flex justify-center items-center h-[300px]">
                <canvas id="bmiChart" class="max-w-screen-md bg-birumuda p-4 rounded-lg mt-3" style="display: none"></canvas>
                <form action="/bmi" method="post" id="calculator" class="flex flex-wrap max-w-screen-md mx-auto">
                    @if(session()->has('success'))
                    <div id="alert-3" class="flex items-center p-4 mx-2 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 w-full dark:text-green-400" role="alert" style="z-index: 10; background-color: {{ session('success')['warna'] }}; color: {{ session('success')['warna_tebal'] }}">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            BMI berhasil dicatata! Nilai BMI anda adalah <strong>{{ session('success')['nilai'] }}</strong> dengan kategori <strong>{{ session('success')['kategori'] }}</strong>
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-zinc-900 p-1.5 hover:bg-zinc-8php art00 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close" style="background-color: {{ session('success')['warna'] }}">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="{{ session('success')['warna_tebal'] }}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        </button>
                    </div>
                    @endif
                    @csrf
                    <div class="flex flex-col w-full sm:w-1/2 px-2">
                        <label for="tb" class="text-sm">Tinggi Badan</label>
                        <input type="number" class="form-input mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tinggi_badan" id="tb" placeholder="cm" required>
                    </div>
                    <div class="flex flex-col w-full sm:w-1/2 px-2">
                        <label for="bb" class="text-sm">Berat Badan</label>
                        <input type="number" class="form-input mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="berat_badan" id="bb" placeholder="Kg" required>
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mt-3">
                        <button type="reset" class="btn w-full bg-biru text-birumuda text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset</button>
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mt-3">
                        <button type="submit" class="btn w-full bg-biru text-birumuda text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Hitung</button>
                    </div>
                </form>
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
                <a href="/bmi/history" class="flex items-center w-28 bg-birumuda text-biru text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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
                <a href="/bmi" class="flex items-center w-28 bg-birumuda text-biru text-4xl hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
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
            @if (!$history)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5">
                @foreach ($bmis as $bmi)   
                <div class="col-lg-4 sm:col-12 container-bmi">
                    <div class="card card-catatan-bmi overflow-hidden border border-gray-300 rounded-lg">
                        <div class="w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="auto" viewBox="0 0 1080 300" xml:space="preserve">
                                <rect x="0" y="0" width="100%" height="100%" fill="transparent"></rect>
                                <g transform="matrix(Infinity 0 0 Infinity 0 0)" id="c848a679-59c8-49ba-bc32-7dc3d952236d">
                                </g>
                                <g transform="matrix(1 0 0 1 540 150)" id="a39c811b-fc4f-4c0e-b6f5-5c672359857e">
                                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; visibility: hidden;" vector-effect="non-scaling-stroke" x="-540" y="-150" rx="0" ry="0" width="1080" height="300"></rect>
                                </g>
                                <g transform="matrix(2.66 0 0 2.66 522 16.91)">
                                <path style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: {{ $bmi->kategori['color'] }}; fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" transform=" translate(-180.51, 3)" d="M 8.88159 -104.913 L 392.923 -104.913 L 392.923 16.098 C 392.923 16.098 398.155 72.265 371.286 69.0971 C 345.875 66.1011 365.19 22.4277 340.974 24.0933 C 321.519 25.4314 337.958 94.7558 310.341 85.2519 C 287.348 77.3396 293.395 43.9421 269.413 46.269 C 246.965 48.447 256.928 98.8809 234.483 98.8809 C 197.883 98.8809 222.977 33.8902 185.743 36.7651 C 169.361 38.0301 164.734 73.2394 149.901 73.2394 C 118.953 73.2394 138.546 46.269 112.162 36.7651 C 88.2284 28.1438 101.086 84.1049 77.0069 79.6835 C 52.3402 75.1541 74.5807 47.4139 48.1121 40.443 C 21.6435 33.4721 48.8796 98.9175 10.7863 98.9175 C 10.1429 98.9175 9.50803 98.9053 8.88163 98.8809 C -83.8029 95.276 8.88159 -104.913 8.88159 -104.913 Z" stroke-linecap="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="card-body overflow-hidden p-4 relative">
                            <h5 class="card-title text-nowrap text-xl font-medium text-biru mb-3">Nilai BMI : <span style="color: {{ $bmi->kategori['strongColor'] }}">{{ $bmi->nilai }}</span></h5>
                            <p class="opacity-50"></p>
                            <a data-modal-target="confirm-modal" data-modal-toggle="confirm-modal" href="/bmi/delete/{{ $bmi->id }}" class="delete-bmi text-blue-500" style="position: absolute; right: 20px; bottom: 15px; font-size: 20px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#131049" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                                </svg>
                            </a>                            <span class="py-2 px-3 rounded-full" style="background-color: {{ $bmi->kategori['color'] }}; color: {{ $bmi->kategori['strongColor'] }}">● {{ $bmi->kategori['status'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            @else
            @foreach ($bmis as $tanggal => $catatanPerTanggal)
            <div class="py-3">
                <div class="border rounded-lg p-2">
                    <div class="flex justify-between items-center text-biru">
                        <p class="m-0 font-semibold">{{ $catatanPerTanggal[0]->hari }}</p>
                        <p class="m-0 font-semibold">{{ $tanggal }}</p>
                    </div>
                </div>
            </div>  
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-5">
            @foreach($catatanPerTanggal as $bmi)
                <div class="col-lg-4 sm:col-12 container-bmi">
                    <div class="card card-catatan-bmi overflow-hidden border border-gray-300 rounded-lg">
                        <div class="w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" viewBox="0 0 1080 300" xml:space="preserve">
                                <rect x="0" y="0" width="100%" height="100%" fill="transparent"></rect>
                                <g transform="matrix(Infinity 0 0 Infinity 0 0)" id="c848a679-59c8-49ba-bc32-7dc3d952236d">
                                </g>
                                <g transform="matrix(1 0 0 1 540 150)" id="a39c811b-fc4f-4c0e-b6f5-5c672359857e">
                                <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1; visibility: hidden;" vector-effect="non-scaling-stroke" x="-540" y="-150" rx="0" ry="0" width="1080" height="300"></rect>
                                </g>
                                <g transform="matrix(2.66 0 0 2.66 522 16.91)">
                                <path style="stroke: rgb(0,0,0); stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: {{ $bmi->kategori['color'] }}; fill-rule: nonzero; opacity: 1;" vector-effect="non-scaling-stroke" transform=" translate(-180.51, 3)" d="M 8.88159 -104.913 L 392.923 -104.913 L 392.923 16.098 C 392.923 16.098 398.155 72.265 371.286 69.0971 C 345.875 66.1011 365.19 22.4277 340.974 24.0933 C 321.519 25.4314 337.958 94.7558 310.341 85.2519 C 287.348 77.3396 293.395 43.9421 269.413 46.269 C 246.965 48.447 256.928 98.8809 234.483 98.8809 C 197.883 98.8809 222.977 33.8902 185.743 36.7651 C 169.361 38.0301 164.734 73.2394 149.901 73.2394 C 118.953 73.2394 138.546 46.269 112.162 36.7651 C 88.2284 28.1438 101.086 84.1049 77.0069 79.6835 C 52.3402 75.1541 74.5807 47.4139 48.1121 40.443 C 21.6435 33.4721 48.8796 98.9175 10.7863 98.9175 C 10.1429 98.9175 9.50803 98.9053 8.88163 98.8809 C -83.8029 95.276 8.88159 -104.913 8.88159 -104.913 Z" stroke-linecap="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="card-body overflow-hidden p-4 relative">
                            <h5 class="card-title text-nowrap text-xl font-medium text-biru mb-3">Nilai BMI : <span style="color: {{ $bmi->kategori['strongColor'] }}">{{ $bmi->nilai }}</span></h5>
                            <p class="opacity-50"></p>                         <span class="py-2 px-3 rounded-full" style="background-color: {{ $bmi->kategori['color'] }}; color: {{ $bmi->kategori['strongColor'] }}">● {{ $bmi->kategori['status'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
            @endif
            </div>            
        </div>
    </div>
</x-app-layout>  

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
                <h3 class="mb-5 text-sm font-normal text-biru dark:text-gray-400">Data BMI yang telah dihapus tidak dapat dikembalikan</h3>
                <button data-modal-hide="confirm-modal" type="button" class="text-biru bg-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Batal
                </button>
                <button data-modal-hide="confirm-modal" type="button" id="confirm-hapus" class="text-white bg-merah hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Ya, Saya yakin
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>