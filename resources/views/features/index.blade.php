@use('App\Enums\FeatureStatus')

<x-app-layout>
  <x-slot:title>{{ __('Features') }}</x-slot>

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
    <div class="mb-12 grid grid-cols-3 gap-8">
      <div
        class="flex items-center justify-between rounded-lg bg-orange-400 px-8 py-5 shadow-sm"
      >
        <div class="flex items-center">
          <svg class="h-8 w-8 fill-current text-white" viewBox="0 0 20 20">
            <path
              d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
            />
          </svg>
          <div class="ml-3 font-medium text-white">
            {{ FeatureStatus::REQUESTED->pluralLabel() }}
          </div>
        </div>
        <div class="ml-3 text-2xl font-medium text-white">
          {{ $statuses->requested }}
        </div>
      </div>
      <div
        class="flex items-center justify-between rounded-lg bg-blue-500 px-8 py-5 shadow-sm"
      >
        <div class="flex items-center">
          <svg class="h-7 w-7 fill-current text-white" viewBox="0 0 20 20">
            <path
              d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
            />
          </svg>
          <div class="ml-3 font-medium text-white">
            {{ FeatureStatus::PLANNED->pluralLabel() }}
          </div>
        </div>
        <div class="ml-3 text-2xl font-medium text-white">
          {{ $statuses->planned }}
        </div>
      </div>
      <div
        class="flex items-center justify-between rounded-lg bg-green-400 px-8 py-5 shadow-sm"
      >
        <div class="flex items-center">
          <svg class="h-8 w-8 fill-current text-white" viewBox="0 0 20 20">
            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
          </svg>
          <div class="ml-3 font-medium text-white">
            {{ FeatureStatus::COMPLETED->pluralLabel() }}
          </div>
        </div>
        <div class="ml-3 text-2xl font-medium text-white">
          {{ $statuses->completed }}
        </div>
      </div>
    </div>

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
                  {{ __('Title') }}
                </th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Status') }}
                </th>
                <th
                  class="border-b border-gray-200 bg-gray-50 px-6 py-3 text-left text-xs leading-4 font-medium tracking-wider text-gray-500 uppercase"
                >
                  {{ __('Comments') }}
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
                  <td
                    class="whitespace-no-wrap border-b border-gray-200 px-6 py-4 text-sm leading-5 text-gray-500"
                  >
                    {{ $feature->comments_count }}
                    {{ str(__('comment'))->plural($feature->comments_count) }}
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
          <div class="bg-gray-50 px-6 py-2">
            {{ $features->links() }}
          </div>
        </div>
      </div>
    </div>
  </main>
</x-app-layout>
