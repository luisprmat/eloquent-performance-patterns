@use('App\Enums\FeatureStatus')

<x-app-layout>
  <x-slot:title>
    <x-feature-title :title="$feature->title" />
  </x-slot>

  <header class="bg-white shadow-sm">
    <div
      class="mx-auto flex max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8"
    >
      <h2 class="py-6 text-3xl leading-tight font-bold text-gray-900">
        <x-feature-title :title="$feature->title" />
      </h2>
      <div class="flex items-center">
        @if ($feature->status === FeatureStatus::REQUESTED)
          <span
            class="flex items-center justify-between rounded-full bg-orange-400 px-6 py-2"
          >
            <div class="flex items-center">
              <svg class="h-4 w-4 fill-current text-white" viewBox="0 0 20 20">
                <path
                  d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                />
              </svg>
              <div class="ml-2 text-sm font-medium text-white">
                {{ FeatureStatus::REQUESTED->label() }}
              </div>
            </div>
          </span>
        @elseif ($feature->status === FeatureStatus::PLANNED)
          <span
            class="flex items-center justify-between rounded-full bg-blue-500 px-6 py-2"
          >
            <div class="flex items-center">
              <svg class="h-4 w-4 fill-current text-white" viewBox="0 0 20 20">
                <path
                  d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"
                />
              </svg>
              <div class="ml-2 text-sm font-medium text-white">
                {{ FeatureStatus::PLANNED->label() }}
              </div>
            </div>
          </span>
        @elseif ($feature->status === FeatureStatus::COMPLETED)
          <span
            class="flex items-center justify-between rounded-full bg-green-400 px-6 py-2"
          >
            <div class="flex items-center">
              <svg class="h-4 w-4 fill-current text-white" viewBox="0 0 20 20">
                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
              </svg>
              <div class="ml-2 text-sm font-medium text-white">
                {{ FeatureStatus::COMPLETED->label() }}
              </div>
            </div>
          </span>
        @endif
      </div>
    </div>
  </header>

  <main class="mx-auto max-w-6xl py-12 sm:px-6 lg:px-8">
    @foreach ($feature->comments as $comment)
      <div
        class="{{ $loop->first ? 'mb-8' : 'mx-auto mb-4 max-w-4xl' }} flex overflow-hidden bg-white px-10 py-8 shadow-sm sm:rounded-lg"
        id="comment-{{ $comment->id }}"
      >
        <div class="whitespace-no-wrap border-r border-gray-200 pr-8">
          @if ($comment->user->photo)
            <div class="h-12 w-12 overflow-hidden rounded-full bg-red-400">
              <img
                class="h-full w-full object-cover"
                src="/img/users/{{ $comment->user->photo }}"
              />
            </div>
          @endif

          <div class="mt-2 text-sm leading-5 text-gray-900">
            {{ $comment->user->name }}
          </div>
          <div class="text-xs leading-5 text-gray-500">
            {{ ucfirst($comment->created_at->isoFormat('MMM D, YYYY ['.__('at').'] h:mm a')) }}
          </div>

          @if ($comment->isAuthor())
            <div class="flex items-center text-yellow-400">
              <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20">
                <path
                  d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"
                />
              </svg>
              <div class="ml-1 text-xs font-medium">{{ __('Author') }}</div>
            </div>
          @endif
        </div>
        <div class="flex flex-1 items-center px-8">
          {{ $comment->comment }}
        </div>
      </div>
    @endforeach
  </main>
</x-app-layout>
