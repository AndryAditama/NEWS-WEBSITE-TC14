<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title }}</title>
</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-white border-gray-200 dark:bg-gray-900 lg:px-16">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-3xl font-bold whitespace-nowrap text-gray-700 dark:text-white">Berita1</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    
                  {{-- cek login dan mengubah tombol menjadi logout jika ada yang login --}}
                    @auth
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownlogout"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">{{ auth()->user()->name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownlogout"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            
                            <li>
                                    <a href="{{ route('admin.home') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                            <li>
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-2" type="submit">Logout</button>
                            </form>
                            </li>

                        </ul>
                    </div>
                        
                    @else
                    <a href="{{ route('login') }}" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                    @endauth

                </div>
            </div>
        </nav>
        <div class="bg-gray-50 dark:bg-gray-700 lg:px-16">
            <div class="px-4 py-3 flex justify-between">
                <div class="w-1/2">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Kategori Berita <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            @foreach ($kategori as $item)
                                <li>
                                    <a href="/?category={{ $item->category_name }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $item->category_name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <form action="{{ route('home') }}" method="GET" class="flex items-center justify-end w-1/2">
                  @if (request('author'))
                                    <input type="hidden" name="author" value="{{ request('author') }}">
                                @endif
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif

                                @csrf
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative lg:w-1/2">

                        <input type="search" id="simple-search" name="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari berita..." value="{{ isset($search) ? $search : '' }}" />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


            </div>
        </div>

        <div class="flex gap-4 px-4 sm:px-16 my-3 flex-col lg:flex-row">
            <div class="w-full lg:w-2/3 min-h-20">
                <div class="flex justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Berita Terbaru</h1>
                    <div>
                        {{ $data->links() }}
                    </div>
                </div>

                {{-- cek jika data kosong maka tampilkan keterangan "tidak ada berita" --}}
                @if ($data->isEmpty())
                <div
                            class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-center font-bold text-3xl text-gray-800">Tidak ada berita</p>
                </div>
                @endif
                @foreach ($data as $item)
                    <div class="w-full block">

                        <div
                            class="w-full p-6 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <div class="w-full">
                                
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->title }}</h5>
                                
                                <div class="mb-3 text-xs flex flex-wrap gap-1 items-center text-gray-600">

                                    <a href="/?author={{ $item->user->name }}">

                                        {{ $item->user->name }}
                                    </a>
                                    <span>| {{ $item->created_at->diffForHumans() }}</span>
                                    <a href="/?category={{ $item->category->category_name }}">

                                        <p class="text-gray-600 p-1 text-xs font-medium rounded-md bg-yellow-200 w-fit">
                                            {{ $item->category->category_name }}</p>
                                    </a>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ Str::limit($item->content, 300, '...') }}
                                </p>

                                <a href="{{ route('post', $item->slug) }}"
                                    class="inline-flex items-center py-2 text-sm font-medium text-center text-blue-500 hover:underline hover:text-blue-700">
                                    Baca selengkapnya &raquo;

                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            </div>
            <div class="sm:w-full md:w-1/3 min-h-10 p-4 bg-white rounded-lg shadow-md">
               <h1 class="text-2xl font-bold mb-4 text-gray-800">Berita Populer</h1>
               @foreach ($beritaPopuler as $berita)
                   
               <div class="w-full my-2 border-b-2 border-b-slate-200">
                  <a href="{{ route('post', $berita->slug) }}" class="text-sm text-blue-500 hover:text-blue-700">
                  <h1 class="font-bold">{{ Str::limit($berita->title, 70, '...') }}</h1></a>
                  <p class="text-xs">{{ $berita->created_at->diffForHumans() }}</p>
               </div>
               @endforeach
            </div>
        </div>
        <x-adminFooter></x-adminFooter>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <script src="../js/script.js"></script>
</body>

</html>
