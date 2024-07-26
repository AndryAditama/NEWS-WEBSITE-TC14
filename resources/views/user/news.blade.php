<x-adminLayout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex flex-col items-center gap-3">




        <div class="flex flex-col items-center w-full p-3 py-4 bg-white rounded-md shadow">
            <h1 class="text-2xl font-bold md:mb-3 mb-1 mt-1">Daftar Berita</h1>
            <div class="w-full lg:w-2/3 p-4">

                <div class="relative overflow-x-auto sm:rounded-lg">
                    <div
                        class="flex flex-column gap-2 sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div class="w-full mb-3 flex justify-between">

                            {{-- modal Toggle --}}
                            <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah"
                                class="block text-white bg-green-600 hover:bg-green-800 text-md rounded-lg text-xl px-2.5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M12 6v12m6-6H6" />
                                </svg>
                            </button>


                            <form class="max-w-lg">
                              @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                <input type="hidden" name="author" value="{{ request('author') }}">
                                @endif
                                @csrf
                                <div class="flex">
                                    <div class="relative w-full">
                                        <input type="search" id="search-dropdown" name="search"
                                            class="rounded-md block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 border-gray-300 focus:border-blue-800 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                            placeholder="Cari Kategori" />
                                        <button type="submit"
                                            class="rounded-e-md absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="w-full mt-6">

                            {{ $data->links() }}
                        </div>

                        {{-- list berita --}}
                        <div class="w-full block">

                           @foreach ($data as $item)
                               
                            <div
                                class="w-full flex p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                
                                <div class="w-full">
                                 <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->content }}
                                </p>
                                <a href="/admin/news?category={{ $item->category->category_name }}">

                                   <p>{{ $item->category->category_name }}</p>
                                 </a>
                                <a href="#"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                                </div>
                                <div class="w-9 ml-2 my-auto h-full px-2 border-l-2 border-gray-200">
                                 <button type="button"
                                                    class="mt-2 focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xl px-2.5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M14.074 3.885c.745-.807 1.117-1.21 1.513-1.446a3.1 3.1 0 0 1 3.103-.047c.403.224.787.616 1.555 1.4c.768.785 1.152 1.178 1.37 1.589a3.29 3.29 0 0 1-.045 3.17c-.23.404-.625.785-1.416 1.546l-9.403 9.057c-1.498 1.443-2.247 2.164-3.183 2.53s-1.965.338-4.023.285l-.28-.008c-.626-.016-.94-.024-1.121-.231c-.183-.207-.158-.526-.108-1.164l.027-.346c.14-1.796.21-2.694.56-3.502s.956-1.463 2.166-2.774zM13 4l7 7m-6 11h8"
                                                            color="currentColor" />
                                                    </svg></button>

                                                <button type="button"
                                                    class="mt-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xl px-2.5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="m14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21q.512.078 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48 48 0 0 0-3.478-.397m-12 .562q.51-.088 1.022-.165m0 0a48 48 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a52 52 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a49 49 0 0 0-7.5 0" />
                                                    </svg></button>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="w-full mt-6">

                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-adminLayout>
