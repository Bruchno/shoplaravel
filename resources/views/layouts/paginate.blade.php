@if ($paginator->hasPages())

<ul class="pagination">
        @if ($paginator->onFirstPage())
            
        <li class="disabled"><div class="page">&laquo;</div></li>

        @else
            
        <li><div class="page"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></div></li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                
            <li class="disabled"><div class="page"><span>{{ $element }}</span></div></li>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        
                    <li class="active"><div class="page"><span>{{ $page }}</span></div></li>

                    @else
                        
                    <li><div class="page"><a href="{{ $url }}">{{ $page }}</a></div></li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            
        <li><div class="page"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></div></li>

        @else
            
        <li class="disabled"><div class="page"><span>&raquo;</span></div></li>

        @endif
    </ul>


@endif