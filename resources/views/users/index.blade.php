<x-app-layout>
  <x-slot:title>{{ __('Clients') }}</x-slot>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2
            class="text-2xl leading-7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:leading-9"
          >
            {{ __('Users') }}
          </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
          <span class="rounded-md shadow-xs">
            <button
              type="button"
              class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm leading-5 font-medium text-gray-700 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-hidden active:bg-gray-50 active:text-gray-800"
            >
              {{ __('New :name', ['name' => __('user')]) }}
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
                  {{ __('Email') }}
                </th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Last Login') }}
                </th>
                <th class="border-b border-gray-200 bg-gray-50 px-6 py-3"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr class="bg-white">
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 font-medium text-gray-900"
                  >
                    {{ $user->name }}
                  </td>
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500"
                  >
                    {{ $user->email }}
                  </td>
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500"
                  >
                    {{ $user->logins()->latest()->first()->created_at->diffForHumans() }}
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
        </div>

        <div class="mt-2">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </main>
</x-app-layout>
