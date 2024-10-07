<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  @vite('resources/css/app.css')
  <script src="//unpkg.com/alpinejs" defer></script>
  <script>
    // tailwind.config = {
    //         theme: {
    //             extend: {
    //                 colors: {
    //                     laravel: "#ef3b2d",
    //                 },
    //             },
    //         },
    //     };
  </script>
  @stack('scripts')
  <title>Travel Timeline - Create your own!</title>
</head>

<body class="relative min-h-screen font-montserrat bg-gray-50">
  <header class="absolute inset-x-0 top-0 z-50">
    <x-navbar />
  </header>

  <div class="h-full max-w-full mx-auto">
    <div class="flex flex-col items-center py-20 mx-auto space-y-8">
      {{$slot}}
    </div>
  </div>
  </div>

  <footer class="absolute bottom-0 w-full bg-bleu-de-france">
    <x-footer />
  </footer>

  <x-flash-message />

</body>


</html>