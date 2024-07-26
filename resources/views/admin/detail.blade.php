<x-adminLayout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex flex-col items-center gap-3">
        <div class="flex flex-col items-center w-full p-3 py-4 bg-white rounded-md shadow">
            <h1 class="text-2xl font-bold md:mb-3 mb-1 mt-1">Detail Berita</h1>
            <div class="w-full lg:w-2/3 p-4">

                <div class="relative overflow-x-auto sm:rounded-lg">
                    
                        <div class="w-full rounded-md p-4 shadow-md">
                            <h1 class="text-2xl font-bold text-gray-900">{{ $detail->title }}</h1>
                            <div class="mb-3 text-xs flex flex-wrap gap-1 items-center text-gray-600">

                                            <a href="/admin/news?author={{ $detail->user->name }}">

                                                {{ $detail->user->name }}
                                            </a>
                                            <span>| {{ $detail->created_at->diffForHumans() }}</span>
                                            <a href="/admin/news?category={{ $detail->category->category_name }}">

                                                <p
                                                    class="text-gray-600 p-1 text-xs font-medium rounded-md bg-yellow-200 w-fit">
                                                    {{ $detail->category->category_name }}</p>
                                            </a>
                                        </div>

                            <p class="text-gray-600">{{ $detail->content }}</p>
                        </div>
                        <div
                        class="flex flex-column gap-2 sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between mt-3">
                        <div class="w-full mb-3 flex justify-between">
                            <a href="{{ route('admin.news') }}"
                                class="block text-white bg-blue-600 hover:bg-blue-800 text-md rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Kembali
                            </a>

                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>
