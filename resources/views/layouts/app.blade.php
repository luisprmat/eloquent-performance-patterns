<!DOCTYPE html>
<html class="font-sans antialiased">
  <head>
    {{-- <title>The Eloquent Blog</title> --}}
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="mx-auto max-w-7xl">
      <div class="text-center">
        <div
          class="mx-auto mt-12 flex h-16 w-16 items-center justify-center rounded-full"
          style="background: #ff2d20"
        >
          <svg class="h-7 w-7 fill-current text-white" viewBox="0 0 140 140">
            <g transform="matrix(5.833333333333333,0,0,5.833333333333333,0,0)">
              <path
                d="M12,.628C6.916.628,1.513,2.376,1.5,5.618l0,.01v12.75c0,3.248,5.409,5,10.5,5s10.5-1.752,10.5-5V5.628C22.5,2.38,17.091.628,12,.628Zm8.5,17.75c0,1.223-3.312,3-8.5,3s-8.5-1.777-8.5-3v-.789a.249.249,0,0,1,.372-.217A17.587,17.587,0,0,0,12,19.128a17.585,17.585,0,0,0,8.127-1.756.249.249,0,0,1,.249,0,.252.252,0,0,1,.124.215Zm0-4.25c0,1.223-3.312,3-8.5,3s-8.5-1.777-8.5-3v-.789a.249.249,0,0,1,.372-.217A17.587,17.587,0,0,0,12,14.878a17.585,17.585,0,0,0,8.127-1.756.249.249,0,0,1,.249,0,.252.252,0,0,1,.124.215Zm0-4.25c0,1.223-3.312,3-8.5,3s-8.5-1.777-8.5-3V9.089a.249.249,0,0,1,.372-.218A17.574,17.574,0,0,0,12,10.628a17.582,17.582,0,0,0,8.127-1.756.25.25,0,0,1,.373.218Zm0-4.25v0c-.011,1.224-3.319,3-8.5,3s-8.5-1.777-8.5-3,3.312-3,8.5-3,8.5,1.773,8.5,3Z"
                stroke="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="0"
              ></path>
            </g>
          </svg>
        </div>
        <h2
          class="mt-4 text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10"
        >
          {{ __('The Eloquent Blog') }}
        </h2>
        <p
          class="mx-auto mt-3 max-w-lg text-xl leading-7 text-gray-500 sm:mt-4"
        >
          {{ __('Eloquent is a Laravel ORM that simplifies queries, relationships, and efficient database management in PHP.') }}
        </p>
      </div>
    </div>

    {{ $slot }}
  </body>
</html>
