@if ($paginator->hasPages())

<style type="text/css">
  .pagination{
    padding-right: 0px;
    margin: 0px;
    margin-top: 20px;
  }
  .page-link{    
    color: #333;
  }

  .page-link:hover{    
    color: #333;
  }
.page-item.active .page-link{
  background-color: #e60000;
  border: 1px solid #e60000;
}

.section-co {
    padding:0px;
}
.last-first{
  background-color: #585858;
  color: #fff;
}
.last-first-disable{


  
}

</style>
<div class="container">
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.prev')">
            {{--  @lang('website.prev') --}}
                <span class="page-link last-first-disable" aria-hidden="true">@if(LaravelLocalization::getCurrentLocale() == 'ar')<i class="fas fa-angle-right"></i> @else <i class="fas fa-angle-left"></i> @endif </span>
            </li>
        @else
            <li class="page-item">
              @php
                    $str = $paginator->previousPageUrl();
                    preg_match_all('!\d+!', $str, $matches);
                @endphp
                <a class="page-link last-first" href="{{ url()->full().'&page='.$matches[0][0] }}" rel="prev" aria-label="@lang('pagination.prev')">
                  @if(LaravelLocalization::getCurrentLocale() == 'ar')<i class="fas fa-angle-right"></i> @else <i class="fas fa-angle-left"></i> @endif
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        
                    @else
                  
                        <li class="page-item"><a class="page-link" href="{{ url()->full().'&page='.$page }}">{{ $page }}</a></li>
                        
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                @php
                    $str = $paginator->nextPageUrl();
                    preg_match_all('!\d+!', $str, $matches);
                @endphp
                <a class="page-link last-first" href="{{ url()->full().'&page='.$matches[0][0] }}" rel="next" aria-label="@lang('pagination.next')">@if(LaravelLocalization::getCurrentLocale() == 'ar')<i class="fas fa-angle-left"></i> @else <i class="fas fa-angle-right"></i> @endif</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
         {{-- @lang('website.next')  --}}    <span class="page-link last-first-disable" aria-hidden="true">@if(LaravelLocalization::getCurrentLocale() == 'ar')<i class="fas fa-angle-left"></i> @else <i class="fas fa-angle-right"></i> @endif</span>
            </li>
        @endif
    </ul>
  </div>

  <div style="height: 30px;"></div>
@endif
