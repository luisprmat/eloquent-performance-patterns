<div class="flex items-center">
  <a
    class="hover:underline"
    href="{{ route($routeName, ['sort' => $column, 'direction' => request('sort') === $column && request('direction') === 'asc' ? 'desc' : 'asc']) }}"
  >
    {{ $slot }}
  </a>
  @if (request('sort') === $column)
    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
      @if (request('direction', 'asc') === 'asc')
        <path
          d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
        />
      @else
        <path
          d="M10.707 7.05L10 6.343 4.343 12l1.414 1.414L10 9.172l4.243 4.242L15.657 12z"
        />
      @endif
    </svg>
  @endif
</div>
