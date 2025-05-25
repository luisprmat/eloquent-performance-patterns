<x-app-layout>
  <main class="px-4 sm:px-6 lg:px-8 lg:pb-28">
    <div class="mx-auto max-w-5xl">
      @foreach ($years as $year => $posts)
        <div class="mt-12">
          <h2
            class="border-b text-2xl leading-9 font-extrabold tracking-tight text-gray-900"
          >
            {{ $year }}
          </h2>
          <div class="mt-2 flex flex-wrap">
            @foreach ($posts as $post)
              <div class="mt-4 w-full sm:w-1/2">
                <a
                  href="/{{ $post->slug }}"
                  class="font-medium text-gray-900 hover:underline"
                >
                  {{ $post->title }}
                </a>
                <div class="text-sm text-gray-500">
                  {{
                    __('Posted :published by :author', [
                        'published' => $post->published_at->isoFormat('ll'),
                        'author' => $post->author->name,
                    ])
                  }}
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </main>
</x-app-layout>
