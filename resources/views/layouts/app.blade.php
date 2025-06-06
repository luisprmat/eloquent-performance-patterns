<!DOCTYPE html>
<html class="bg-gray-200 font-sans antialiased">
  <head>
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex shrink-0 items-center">
              <svg
                class="h-6 w-auto fill-current text-green-400"
                viewBox="0 0 20 20"
              >
                <path
                  d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"
                />
              </svg>
              <span class="ml-2 text-xl font-bold text-white">
                {{ __('Stores') }}
              </span>
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline">
                <a
                  href="/"
                  class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white focus:bg-gray-700 focus:text-white focus:outline-hidden"
                >
                  {{ __('Locations') }}
                </a>
                <a
                  href="#"
                  class="ml-4 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white focus:outline-hidden"
                >
                  {{ __('Users') }}
                </a>
                <a
                  href="#"
                  class="ml-4 rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white focus:outline-hidden"
                >
                  {{ __('Settings') }}
                </a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button
                class="rounded-full border-2 border-transparent p-1 text-gray-400 hover:text-white focus:bg-gray-700 focus:text-white focus:outline-hidden"
                aria-label="Notifications"
              >
                <svg
                  class="h-6 w-6"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                  />
                </svg>
              </button>
              <button
                class="focus:shadow-solid ml-3 flex max-w-xs items-center rounded-full text-sm text-white focus:outline-hidden"
                id="user-menu"
                aria-label="User menu"
                aria-haspopup="true"
                x-bind:aria-expanded="open"
              >
                <img
                  class="h-8 w-8 rounded-full"
                  src="/img/luisp.png"
                  alt="Luis Parrado"
                />
              </button>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <button
              class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white focus:outline-hidden"
              x-bind:aria-label="open ? 'Close main menu' : 'Main menu'"
              x-bind:aria-expanded="open"
            >
              <svg
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  class="inline-flex"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    {{ $slot }}
  </body>
</html>
