<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   @vite('resources/css/app.css')
   @vite(['resources/css/app.css','resources/js/app.js'])
   <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
   <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <title>{{ $title }}</title>
</head>
<body class="h-full">
   <div class="min-h-full">
      <x-adminNavbar />

      <x-adminHeader>{{ $title }}</x-adminHeader>
      <main>
         <div class="mx-auto lg:px-28 max-w-7xl px-4 py-4 sm:px-6">
            <!-- Your content -->
            {{ $slot }}
         </div>
      </main>

      <x-adminFooter/>

   </div>

   <script src="../js/script.js"></script>
</body>
</html>