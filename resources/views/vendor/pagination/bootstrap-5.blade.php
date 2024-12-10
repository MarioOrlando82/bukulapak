@if ($paginator->hasPages())
    <nav>
        <ul class="pagination mt-4">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link bigger-arrow">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link bigger-arrow" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link fs-6">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link fs-6" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link bigger-arrow" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link bigger-arrow">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
