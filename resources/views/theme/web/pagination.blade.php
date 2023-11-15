@if ($paginator->hasPages())
    <nav>
        <ul class="pagination paginasi">
            @if ($paginator->onFirstPage())
            @else
                <li class="page-item">
                    <a href="javascript:;" halaman="{{ $paginator->previousPageUrl() }}" class="page-link paginasi">&lsaquo;</a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">  <a href="javascript:;" class="page-link">{{ $page }}</a></li>
                        @else
                            <li halaman="{{ $url }}" href="javascript:;" class="page-link paginasi">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a halaman="{{ $paginator->nextPageUrl() }}" href="javascript:;"  class="page-link paginasi">&rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
