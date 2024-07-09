<!DOCTYPE html>

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Non League Network</title>
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <script src="/app.js"></script>
      <script src="https://cdn.tailwindcss.com?plugins=forms&aspect-ratio"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <link rel="stylesheet" href="/app.css">
  </head>

  <body class="{{ App\Helpers\PageHelper::bodyClass() }}">
    {{ $slot }}
    <x-flash />
    <x-footer />
  </body>
