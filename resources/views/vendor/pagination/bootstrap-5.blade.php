@if ($paginator->hasPages())




     {{-- desktop --}}
     <nav class="d-none d-sm-block m-b-30">
          <ul class="pagination justify-content-center pagination-primary">
               {{-- Previous Page Link --}}
               @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                         <a class="page-link" href="javascript:void(0)">
                              <i class="fa-solid fa-arrow-left"></i>
                         </a>
                    </li>
               @else
                    <li class="page-item">
                         <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                              <i class="fa-solid fa-arrow-left"></i>
                         </a>
                    </li>
               @endif

               {{-- Pagination Elements --}}
               @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                         <li class="page-item disabled" aria-disabled="true"><span class="page-link"><i class="fa-solid fa-ellipsis"></i></span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                         @foreach ($element as $page => $url)
                              @if ($page == $paginator->currentPage())
                                   <li class="page-item active">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                   </li>
                              @else
                                   <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                   </li>
                              @endif
                         @endforeach
                    @endif
               @endforeach

               {{-- Next Page Link --}}
               @if ($paginator->hasMorePages())
                    <li class="page-item">
                         <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                              <i class="fa-solid fa-arrow-right"></i>
                         </a>
                    </li>
               @else
                    <li class="page-item disabled">
                         <a class="page-link" href="javascript:void(0)">
                              <i class="fa-solid fa-arrow-right"></i>
                         </a>
                    </li>
               @endif

          </ul>


     </nav>
     <div class="d-none d-sm-block">
        <p class="small text-muted text-center">
             {!! __('Showing') !!}
             <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
             {!! __('to') !!}
             <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
             {!! __('of') !!}
             <span class="fw-semibold">{{ $paginator->total() }}</span>
             {!! __('results') !!}
        </p>
   </div>
     {{-- mobile --}}
     <nav class="d-block d-sm-none m-b-30">
          <ul class="pagination justify-content-center pagination-primary">
               {{-- Previous Page Link --}}
               @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                         <a class="page-link" href="javascript:void(0)">
                              <i class="fa-solid fa-arrow-left"></i> Previous
                         </a>
                    </li>
               @else
                    <li class="page-item">
                         <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                              <i class="fa-solid fa-arrow-left"></i> Previous
                         </a>
                    </li>
               @endif

               {{-- Next Page Link --}}
               @if ($paginator->hasMorePages())
                    <li class="page-item">
                         <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                              Next <i class="fa-solid fa-arrow-right"></i>
                         </a>
                    </li>
               @else
                    <li class="page-item disabled">
                         <a class="page-link" href="javascript:void(0)">
                              Next <i class="fa-solid fa-arrow-right"></i>
                         </a>
                    </li>
               @endif



          </ul>
     </nav>


@endif
