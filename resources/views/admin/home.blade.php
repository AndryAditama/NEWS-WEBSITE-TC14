<x-adminLayout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex flex-col items-center w-full lg:h-96 p-3 py-4 bg-white rounded-md shadow">
        <div class="w-full p-4 flex gap-4 flex-wrap lg:flex-nowrap">

            <div class="lg:w-1/2 w-full p-3 py-4 shadow-md rounded-md bg-orange-400">
                <h1 class="text-2xl font-bold text-white">Total Berita</h1>

                <p class="text-5xl font-extrabold text-white">{{ $totalBerita }}</p>

            </div>
            <div class="lg:w-1/2 w-full p-3 py-4 shadow-md rounded-md bg-blue-400">
                <h1 class="text-2xl font-bold text-white">Total Kategori</h1>
                <p class="text-5xl font-extrabold text-white">{{ $totalKategori }}</p>
            </div>
            <div class="lg:w-1/2 w-full p-3 py-4 shadow-md rounded-md bg-green-400">
                <h1 class="text-2xl font-bold text-white">Total Penulis</h1>
                <p class="text-5xl font-extrabold text-white">{{ $totalAuthor }}</p>
            </div>
            @foreach ($rolename as $role)
                            
            @endforeach

        </div>
</x-adminLayout>
