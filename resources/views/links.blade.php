<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pinboard</title>

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./css/app.css">

    </head>
    <body class="bg-topo">
      <div class="container mx-auto">
            <h1 class="text-4xl my-8 text-teal-dark font-bold text-center">Links For Days 🔗</h1>
            @foreach ($data as $link)
            <div class="p-4 m-8 text-grey-darker bg-grey-lightest rounded-lg max-w-md mx-auto">
              <h2 class="text-xl font-semibold mb-2"><a class="no-underline text-teal-dark" href="{{ $link[0]['href'] }}">{{ $link[0]['description'] }}</a></h2>
              <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12" class="fill-current mr-1"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8.41l2.54 2.53a1 1 0 0 1-1.42 1.42L11.3 12.7A1 1 0 0 1 11 12V8a1 1 0 0 1 2 0v3.59z"/></svg>
              <p class="text-xs uppercase tracking-wide mb-2">
                {{ date("l, M j", strtotime($link[0]['time'])) }}</p>
              </div>
              <p class="mb-2">{{ $link[0]['extended'] }}</p>
              {{-- 2018-12-01T07:48:23Z --}}
            </div>
            @endforeach
      </div>
    </body>
</html>
