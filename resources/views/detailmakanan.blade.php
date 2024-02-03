<x-app-layout>
    <div class="min-h-screen max-w-7xl mx-auto p-6 lg:p-8 w-full mt-16">
        <div class="rounded-lg border shadow">
            <img src="{{ $makanan->gambar }}" class="w-full rounded-lg object-cover max-h-96" alt="">
        </div>
        <div class="mt-4">
            <h1 class="text-5xl text-biru font-bold mb-1">
                {{ $makanan->nama }}
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <div class="p-3 bg-birumuda mb-3 text-biru">
                        Kandungan Makanan
                    </div>
                    <table class="table-auto border border-collapse text-start">
                        <tr>
                            <th class="border p-2 text-biru text-start">Karbohidrat</th>
                            <td class="border p-2 text-biru text-start">{{ $makanan->karbohidrat }} g</td>
                        </tr>
                        <tr>
                            <th class="border p-2 text-biru text-start">Protein</th>
                            <td class="border p-2 text-biru text-start">{{ $makanan->protein }} g</td>
                        </tr>
                        <tr>
                            <th class="border p-2 text-biru text-start">Garam</th>
                            <td class="border p-2 text-biru text-start">{{ $makanan->garam }} g</td>
                        </tr>
                        <tr>
                            <th class="border p-2 text-biru text-start">Gula</th>
                            <td class="border p-2 text-biru text-start">{{ $makanan->gula }} g</td>
                        </tr>
                        <tr>
                            <th class="border p-2 text-biru text-start">Lemak</th>
                            <td class="border p-2 text-biru text-start">{{ $makanan->lemak }} g</td>
                        </tr>
                    </table>
                </div>
                <div class="flex flex-col">
                    <div class="p-3 bg-birumuda mb-3 text-biru">
                        Deskripsi
                    </div>
                    <p>
                        {{ $makanan->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>