<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>





  @vite([
  'resources/css/app.css',
  'resources/js/app.js',
  'resources/js/tagify-init.js',
  'resources/js/like.js'
  ])










</head>

<body class="bg-gray-100 font-sans antialiased">
  <main class="max-w-7xl mx-auto mt-8">
    {{ $slot }}
  </main>
</body>

</html>