@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Botão "Anterior" --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
                </li>
            @endif

            {{-- Links das páginas --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botão "Próximo" --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próximo</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">Próximo</span></li>
            @endif
        </ul>
    </nav>
@endif


{{-- @push('style')
    <link rel="stylesheet" href="/css/components/pagination.css">
@endpush --}}
{{-- deixa da cor da sidebar --}}