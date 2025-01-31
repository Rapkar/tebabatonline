<nav aria-label="Page navigation example">
  <ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($items->onFirstPage())
      <li class="page-item disabled"><span class="page-link">{{ __("admin.Previous") }}</span></li>
    @else
      <li class="page-item"><a class="page-link" href="{{ $items->previousPageUrl() }}">{{ __("admin.Previous") }}</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($items->links()->elements as $element)
      {{-- "Three Dots" Separator --}}
      @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
      @endif

      {{-- Array Of Links --}}
      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $items->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
          @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($items->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{ $items->nextPageUrl() }}">{{ __("admin.Next") }}</a></li>
    @else
      <li class="page-item disabled"><span class="page-link">{{ __("admin.Next") }}</span></li>
    @endif
  </ul>
</nav>
