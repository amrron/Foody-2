<x-app-layout>
    <div class="min-h-screen mt-16">
        <div class="flex flex-col justify-center p-6 lg:p-8 max-w-7xl mx-auto">
            <div class="p-3 border rounded-lg relative">
                <div class="grid relative grid-cols-1 md:grid-cols-3 gap-3">
                    <a href="/profile/setting" class="absolute top-0 right-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear-wide" viewBox="0 0 16 16">
                            <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
                        </svg>
                    </a>
                    <div class="photo col-span-1 sm:col-span-1 flex flex-col items-center">
                        <div class="photo-profile text-center">
                            <div class="relative" title="Ubah foto profile">
                                <img src="{{ $user->gambar ?? "/assets/img/profileimg.webp"}}" class="aspect-square object-cover w-[150px] rounded-full" alt="">
                                <button class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-black w-full h-full rounded-full opacity-0 hover:opacity-50 flex justify-center items-center" data-dropdown-toggle="edit-profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 13 14" fill="none">
                                        <path
                                            d="M6.63217 9.35637C5.89991 10.0105 4.81087 9.85306 4.11659 9.15878C3.42244 8.46464 3.2651 7.37585 3.91991 6.64448C4.17648 6.35791 4.46266 6.07263 4.77838 5.78878C5.81553 4.8545 7.64619 3.2752 10.2696 1.05087C10.5354 0.825418 10.8762 0.708184 11.2245 0.722456C11.5727 0.736728 11.9028 0.881461 12.1493 1.12791C12.3957 1.37435 12.5405 1.70448 12.5547 2.05272C12.569 2.40095 12.4518 2.74181 12.2263 3.0076C9.99891 5.63565 8.42037 7.46631 7.48919 8.49882C7.20495 8.81406 6.91928 9.09991 6.63217 9.35637ZM0.810014 9.8713C1.4253 9.43065 2.26907 9.49989 2.80431 10.0349L3.239 10.4695C3.77585 11.0061 3.84529 11.8525 3.4031 12.4695C3.21459 12.7326 2.9485 12.93 2.64213 13.0343L2.55325 13.0645C1.10967 13.5557 -0.271993 12.1815 0.211269 10.7353L0.243541 10.6387C0.346819 10.3296 0.545072 10.061 0.810014 9.8713Z"
                                            fill="#D9F4FF" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="data col-span-1 sm:col-span-2 flex flex-col justify-center">
                        <h5 class="text-biru text-3xl text-center md:text-left">{{ $user->name }}</h5>
                        <p class="mt-1 text-center md:text-left">{{ $user->jenis_kelamin }}, {{ $user->usia }} Tahun</p>
                        <table class="mt-3">
                            <tr>
                                <td class="font-light">Email</td>
                                <td class="text-biru">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-light">Tinggi</td>
                                <td class="text-biru">{{ $user->tinggiBadan }} cm</td>
                            </tr>
                            <tr>
                                <td class="font-light">Berat</td>
                                <td class="text-biru">{{ $user->beratBadan }} kg</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4 relative">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="m-0 flex items-center">
                                Level Aktivitas 
                                <button data-popover-target="popover-description" data-popover-placement="bottom-start" type="button"><svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                            </p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->aktivitas }}</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="m-0">Kebutuhan Kalori harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->kebutuhanKalori }} kkal</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Rata-rata BMI</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->rataRataBmi }}</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Batas karbohidrat harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->batasKarbo }} g</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Batas protein harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->batasProtein }} g</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Batas garam harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->batasGaram }} g</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Batas gula harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->batasGula }} g</p>
                        </div>
                    </div>
                    <div class="border rounded-lg p-3">
                        <img src="/img/blueup.svg" class="me-3" alt="">
                        <div class="">
                            <p class="text-base text-semibold text-biru">Batas lemak harian</p>
                            <p class="fs-5 fw-bold text-biru m-0 text-xl font-bold">{{ $user->batasLemak }} g</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 border rounded-lg p-3">
                    <div class="bg-white rounded-lg p-4 md:p-6"> 
                        <div class="py-6" id="donut-chart"></div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class=" w-full">
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <h5 class="font-bold text-biru">Karbohidrat</h5>
                                    <p class="text-biru">{{ $user->dailyKarbo }}/{{ $user->batasKarbo }} g</p>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                    <div class="bg-biru text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round($user->dailyKarbo / $user->batasKarbo * 100) }}%"> {{ round($user->dailyKarbo / $user->batasKarbo * 100) }}%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <h5 class="font-bold text-biru">Protein</h5>
                                    <p class="text-biru">{{ $user->dailyProtein }}/{{ $user->batasProtein }} g</p>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                    <div class="bg-birumuda text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round($user->dailyProtein / $user->batasProtein * 100) }}%"> {{ round($user->dailyProtein / $user->batasProtein * 100) }}%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <h5 class="font-bold text-biru">Garam</h5>
                                    <p class="text-biru">{{ $user->dailyGaram }}/{{ $user->batasGaram }} g</p>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                    <div class="bg-ping text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round($user->dailyGaram / $user->batasGaram * 100) }}%"> {{ round($user->dailyGaram / $user->batasGaram * 100) }}%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <h5 class="font-bold text-biru">Gula</h5>
                                    <p class="text-biru">{{ $user->dailyGula }}/{{ $user->batasGula }} g</p>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                    <div class="bg-black text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ $user->dailyGula / $user->batasGula * 100 }}%"> {{ round($user->dailyGula / $user->batasGula * 100) }}%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <h5 class="font-bold text-biru">Lemak</h5>
                                    <p class="text-biru">{{ $user->dailyLemak }}/{{ $user->batasLemak }} g</p>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 overflow-hidden">
                                    <div class="bg-[#6c6a85] text-xs font-medium text-birumuda text-center p-0.5 leading-none rounded-full" style="width: {{ round($user->dailyLemak / $user->batasLemak * 100) }}%"> {{ round($user->dailyLemak / $user->batasLemak * 100) }}%</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
<div data-popover id="popover-description" role="tooltip" class="absolute w-56 z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
    <div class="p-3 space-y-2">
        <div class="grid grid-cols-2">
            <p class="text-biru font-bold">1.2</p>
            <p class="text-biru">Tidak aktif (tidak berolahraga sama sekali)</p>
            <p class="text-biru font-bold">1.375</p>
            <p class="text-biru">Cukup aktif (berolahraga 1-3x seminggu)</p>
            <p class="text-biru font-bold">1.55</p>
            <p class="text-biru">Aktif (berolahraga 3-5x seminggu)</p>
            <p class="text-biru font-bold">1.725</p>
            <p class="text-biru">Sangat aktif (berolahraga 6-7x seminggu)</p>
            <p class="text-biru font-bold">1.9</p>
            <p class="text-biru">Super aktif (berolahraga 1-2x setiap hari)</p>
        </div>
    </div>
    <div data-popper-arrow></div>
</div>

<div id="edit-profile" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg border w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <label for="gambar" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ isset($user->gambar) ? "Ubah" : "Upload"  }} foto</label>
      </li>
      @if (isset($user->gambar))
      <li>
        <a href="#" id="remove-pp" class="block px-4 py-2 text-merah hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hapus foto</a>
      </li>
      @endif
    </ul>
    <div data-popper-arrow></div>
</div>

<form action="/profile/update-gambar" id="edit-profile-form" enctype="multipart/form-data" method="post" class="hidden">
  @csrf
    <input type="file" name="gambar" id="gambar" accept="image/*">
    @if (isset($user->gambar))
        <input type="hidden" name="old_gambar" value="{{ $user->gambar }}">
    @endif
</form>

@if(session()->has('change_success'))
<div id="toast-berhasil" class="fixed top-20 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
      </svg>
      <span class="sr-only">Check icon</span>
  </div>
  <div class="ms-3 text-sm font-normal message">{{ session('change_success') }}</div>
  <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-berhasil" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
    </svg>
</button>
</div>
@endif

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      const getChartOptions = () => {
          return {
            series: [{{ $user->dailyKarbo }}, {{ $user->dailyProtein }}, {{ $user->DailyGaram }}, {{ $user->dailyGula }}, {{ $user->dailyLemak }}],
            colors: ["#131049", "#d9f4ff", "#fdced0", "#111111", "#6c6a85"],
            chart: {
              height: 320,
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