@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" style="width: 30px; height: 32px;">
                    <span class="page-link" aria-hidden="true" style="width: 100%; height: 100%; padding: 5px 10px;">&lsaquo;</span>
                </li>
            @else
                <li class="page-item" style="width: 30px; height: 32px;">
                    <a style="width: 100%; height: 100%; padding: 5px 10px;" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true" ><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page" style="width: 30px; height: 32px;"><span class="page-link" style="width: 100%; height: 100%; padding: 5px 10px;">{{ $page }}</span></li>
                        @else
                            <li class="page-item" style="width: 30px; height: 32px;"><a class="page-link" href="{{ $url }}" style="width: 100%; height: 100%; padding: 5px 10px;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" style="width: 30px; height: 32px;">
                    <a style="width: 100%; height: 100%; padding: 5px 10px;" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')" style="width: 30px; height: 32px;">
                    <span style="width: 100%; height: 100%; padding: 5px 10px;" class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
