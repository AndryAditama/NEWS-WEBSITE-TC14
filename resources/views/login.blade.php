<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title }}</title>
</head>

<body class="flex h-full w-full flex-col items-center justify-center bg-slate-800 p-4">
    <h1 class="mb-10 block text-center text-3xl font-bold text-blue-300 lg:text-4xl">
        Selamat Datang di Portal Berita
    </h1>
    <div class="w-full rounded-md bg-slate-300 p-4 shadow-md lg:w-1/3">
        <h1 class="mb-10 text-center text-4xl font-bold text-blue-700">Login</h1>

        <form action="{{ route('login.process') }}" method="POST" class="mx-auto max-w-sm">
            @csrf
            <div class="mb-5">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Email
                </label>
                <input type="text" id="email" name="email" autocomplete="off"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                    Password
                </label>
                <input type="password" id="password" name="password"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    required />
            </div>
            {{-- <div class="mb-5 flex items-start">
                    <div class="flex h-5 items-center">
                        <input
                            id="remember"
                            type="checkbox"
                            value=""
                            class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                            required
                        />
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Remember me
                    </label>
                </div> --}}
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Login
            </button>
        </form>
        

        @if (session('error'))
            <div>{{ session('error') }}</div>
        @endif
    </div>
    <div class="mt-6">
         <a href="{{ route('home') }}" class="text-sm font-medium text-white hover:underline dark:text-blue-500">Kembali</a>
        </div>
    <script src="../js/script.js"></script>
</body>

</html>
