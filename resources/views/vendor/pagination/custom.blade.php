
@if ($paginator->hasPages())
    <div class="paginationlist patient-pagination">
                            <ul>
                                <li>
                                @if ($paginator->onFirstPage())
                                <a type="button"> 
                                    <button class="paginatebtn">
                                    <span>
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    </span>
                                   </button>
                                </a>
                                 @else
                                 <a type="button" class="paginatebtn" href="{{ $paginator->previousPageUrl() }}">
                                     <button class="paginatebtn">
                                    <span>
                                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    </span>
                                     </button>
                                </a>
                                 @endif
                                </li>


                                @foreach ($elements as $element)
           
                                    @if (is_string($element))
                                        <li class="disabled"><span>{{ $element }}</span></li>
                                    @endif


                                   
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $paginator->currentPage())
                                                <li class="active my-active"><span>{{ $page }}</span></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <li>
                                    @if ($paginator->hasMorePages())
                                    <a type="button"  href="{{ $paginator->nextPageUrl() }}">
                                       <button class="paginatebtn">
                                       <span class="righticon">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                       </button>
                                    </a>
                                    @else
                                     <a type="button">
                                        <button class="paginatebtn">
                                        <span class="righticon">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </span>
                                        </button>
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
@endif