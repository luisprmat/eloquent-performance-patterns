<x-app-layout>
  <x-slot:title>{{ __('Wants') }}</x-slot>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2
            class="text-2xl leading-7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:leading-9"
          >
            {{ __('Features') }}
          </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <span class="rounded-md shadow-xs">
            <button
              type="button"
              class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm leading-5 font-medium text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-hidden active:bg-gray-50 active:text-gray-800"
            >
              {{ __('New feature') }}
            </button>
          </span>
        </div>
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-6xl py-12 sm:px-6 lg:px-8">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="inline-block min-w-full overflow-hidden align-middle shadow-sm sm:rounded-lg"
        >
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="w-1/2 border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  <x-order-by-column route-name="features.index" column="title">
                    {{ __('Title') }}
                  </x-order-by-column>
                </th>
                <th
                  class="w-1/4 border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  <x-order-by-column
                    route-name="features.index"
                    column="status"
                  >
                    {{ __('Status') }}
                  </x-order-by-column>
                </th>
                <th
                  class="w-1/4 border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  <x-order-by-column
                    route-name="features.index"
                    column="activity"
                  >
                    {{ __('Activity') }}
                  </x-order-by-column>
                </th>
                <th class="border-b border-gray-200 bg-gray-50 px-6 py-3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($features as $feature)
                <tr class="bg-white">
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 font-medium text-gray-900"
                  >
                    <x-feature-title :title="$feature->title" />
                  </td>
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500"
                  >
                    <x-status-badge :status="$feature->status" />
                  </td>
                  <td class="border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center text-sm">
                      <div class="flex items-baseline text-green-600">
                        <svg class="size-3 fill-current" viewBox="0 0 20 20">
                          <path
                            d="M11 0h1v3l3 7v8a2 2 0 01-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 012-2h7V2a2 2 0 012-2zm6 10h3v10h-3V10z"
                          />
                        </svg>
                        <div class="ml-1 font-medium">
                          {{ $feature->votes_count }}
                        </div>
                      </div>
                      <div class="ml-3 flex items-center text-blue-600">
                        <svg
                          class="mt-[2px] size-3 fill-current"
                          viewBox="0 0 40 40"
                          width="40"
                          height="40"
                        >
                          <title>
                            Exported from Streamline App
                            (https://app.streamlineicons.com)
                          </title>
                          <g
                            transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)"
                          >
                            <path
                              d="M21.5,2h-19C1.672,2,1,2.672,1,3.5v13C1,17.328,1.672,18,2.5,18h4.252c0.138,0,0.25,0.112,0.25,0.25v3.25 c0,0.276,0.224,0.5,0.5,0.5c0.132,0,0.259-0.052,0.353-0.146l3.781-3.781C11.683,18.026,11.747,18,11.813,18H21.5 c0.828,0,1.5-0.672,1.5-1.5v-13C23,2.672,22.328,2,21.5,2z"
                              stroke="none"
                              stroke-width="0"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            ></path>
                          </g>
                        </svg>
                        <div class="ml-1 font-medium">
                          {{ $feature->comments_count }}
                        </div>
                      </div>
                      {{--
                        <div class="ml-2 text-orange-500">
                        ({{ $feature->votes_count + ($feature->comments_count * 2) }})
                        </div>
                      --}}
                    </div>
                  </td>
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-right text-sm leading-5 font-medium"
                  >
                    <a
                      href="#"
                      class="text-indigo-600 hover:text-indigo-900 focus:underline focus:outline-hidden"
                    >
                      {{ __('Edit') }}
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $features->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </main>
</x-app-layout>
