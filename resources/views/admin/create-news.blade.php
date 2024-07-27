<x-adminLayout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex flex-col items-center gap-3">

        {{-- Handle Error --}}
        {{-- Handle Success --}}
        @if (session('success'))
            <div id="alert-border-3"
                class="fixed bottom-0 right-0 flex z-10 items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Handle Error --}}
        @if ($errors->any())
            <div id="alert-border-2"
                class="fixed bottom-0 right-0 flex z-10 items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ 'GAGAL! Inputan tidak valid' }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Handle Error Validation --}}
        @if (session('error'))
            <div id="alert-border-2"
                class="fixed bottom-0 right-0 flex z-10 items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        <div class="flex flex-col items-center w-full p-3 py-4 bg-white rounded-md shadow">
            <h1 class="text-2xl font-bold md:mb-3 mb-1 mt-1">Detail Berita</h1>
            <div class="w-full lg:w-2/3 p-4">

                <div class="relative overflow-x-auto sm:rounded-lg">
                    <div
                        class="mb-2 flex flex-column gap-2 sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between mt-3">
                        <div class="w-full mb-3 flex justify-between">
                            <a href="{{ route('admin.news') }}"
                                class="block text-white bg-blue-600 hover:bg-blue-800 text-md rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Kembali
                            </a>

                        </div>


                    </div>
                    <form action="{{ route('admin.news.store') }}" method="POST">
                        <div class="w-full rounded-md bg-slate-50 p-4 shadow-md">
                            @csrf
                            <div class="mb-2">
                                <div class="flex justify-between items-center">

                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Berita</label>

                                </div>
                                <input type="text" name="title" id="title"
                                    class="border bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Judul berita" autocomplete="off" required />
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between items-center">

                                    <label for="kategori"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>

                                </div>

                                <select id="kategori" name="kategori"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between items-center">
                                    <label for="penulis"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>

                                </div>

                                {{-- cek user yang login --}}
                                @if (Auth::user()->role->role_name == 'Admin')
                                    <select id="penulis" name="penulis"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($author as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                @if (Auth::user()->role->role_name == 'Penulis')
                                    <select id="penulis" name="penulis"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                    
                                </select>
                                 @endif

                                
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between items-center">
                                    <label for="konten"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten
                                        Berita</label>

                                </div>
                                <textarea id="konten" name="konten" rows="4"
                                    class="block p-2.5 w-full  text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Konten berita anda..."></textarea>
                            </div>

                        </div>

                        <div class="flex gap-3 justify-end mt-3">

                            <button type="submit"
                                class=" text-white bg-blue-600 hover:bg-blue-800 text-md rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>
