@if($paginator->hasPages())
   <ul class="pagination">
            @if($paginator->onFirstPage())
                       <li class="page-item disabled "><span class="page-link">Previous</span></li>
                           @else

                           <li class="page-item"><a class="page-link" href="{{$paginator->previousPageUrl()}}">Previous</a></li>
            @endif

            <!-- Boucler sur les pages  !>
                                            @foreach($elements as $element)
                                                         <-- cas d'une seule page -->
                                                                  @if(is_string($element))
                                                                              <li class="page-item disabled "><span class="page-link">{{$element}}</span></li>
                                                                  @endif

                                                                  <!-- cas de plusieurs pages -->
                                                                    @if(is_array($element))
                                                                                @foreach($element as $page=>$url)
                                                                                        @if($page==$paginator->currentPage())
                                                                                                 <li class="page-item active"> <span class="page-link" >{{$page}}</span></li>
                                                                                               @else
                                                                                                <li class="page-item"> <a class="page-link" href="{{$url}}">{{$page}}</a></li>
                                                                                        @endif
                                                                                 @endforeach
                                                                    @endif
                                             @endforeach
                                     @if($paginator->hasMorePages())

                                             <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">Next</a></li>
                                             @else
                                             <li class="page-item"><span class="page-link">Next</span></li>
                                    @endif
    </ul>
@endif
