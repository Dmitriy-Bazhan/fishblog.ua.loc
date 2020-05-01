@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled btn btn-secondary active" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>&nbsp;
        @else
            <li>
                <a class="btn btn-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>&nbsp;
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled btn btn-secondary active" aria-disabled="true"><span>{{ $element }}</span></li>&nbsp;
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="btn btn-secondary active" aria-current="page"><span>{{ $page }}</span></li>&nbsp;
                    @else
                        <li><a class="btn btn-secondary" href="{{ $url }}">{{ $page }}</a></li>&nbsp;
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="btn btn-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled btn btn-secondary active" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
