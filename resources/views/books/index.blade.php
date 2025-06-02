<x-app-layout>
  <x-slot:title>{{ __('Books') }}</x-slot>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2
            class="text-2xl leading-7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:leading-9"
          >
            {{ __('Books') }}
          </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <span class="rounded-md shadow-xs">
            <button
              type="button"
              class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm leading-5 font-medium text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-hidden active:bg-gray-50 active:text-gray-800"
            >
              {{ __('New :name', ['name' => __('book')]) }}
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
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Name') }}
                </th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Author') }}
                </th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Availability') }}
                </th>
                <th class="border-b border-gray-200 bg-gray-50 px-6 py-3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)
                <tr class="bg-white">
                  <td
                    class="border-b border-gray-200 px-6 py-4 text-sm leading-5 font-medium whitespace-nowrap text-gray-900"
                  >
                    {{ $book->name }}
                  </td>
                  <td
                    class="border-b border-gray-200 px-6 py-4 text-sm leading-5 whitespace-nowrap text-gray-500"
                  >
                    {{ $book->author }}
                  </td>
                  <td
                    class="border-b border-gray-200 px-6 py-4 text-sm leading-5 whitespace-nowrap text-gray-500"
                  >
                    @if ($book->user)
                      <div
                        class="inline-flex rounded-full bg-orange-100 px-2 text-xs leading-5 font-semibold text-orange-800"
                      >
                        {{ __('Borrowed by :name', ['name' => $book->user->name]) }}
                      </div>
                    @else
                      <span
                        class="inline-flex rounded-full bg-green-100 px-2 text-xs leading-5 font-semibold text-green-800"
                      >
                        {{ __('Available') }}
                      </span>
                    @endif
                  </td>
                  <td
                    class="border-b border-gray-200 px-6 py-4 text-right text-sm leading-5 font-medium whitespace-nowrap"
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
          {{ $books->links() }}
        </div>
      </div>
    </div>
  </main>
</x-app-layout>
