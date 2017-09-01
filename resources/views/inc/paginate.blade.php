@if($show)
Mostrar {!! Form::select('', []+config('domains.Registros'), $paginate->perPage(), ['id'=>'mostrar']) !!} registros
@endif
            <div class="box-tools pull-right form-inline ">
              Pagina {{$paginate->currentPage()}} registro {{$paginate->firstItem()}} - {{$paginate->lastItem()}} de {{$paginate->total()}}&nbsp;&nbsp;&nbsp;
              @if($paginate->currentPage()>1)
          <a class="paginate" data="1" > <button class="btn  btn-default"><i class="fa fa-angle-double-left"></i></button> </a>
          @endif
           @if(!empty($paginate->currentPage()))
            @if($paginate->currentPage()>1)
          <a class="paginate" data="{{$paginate->currentPage()-1}}" > <button class="btn btn-default"><i class="fa fa-angle-left"></i></button>
          </a>
           @endif
          @endif
          @if(!empty($paginate->hasMorePages()))
          <a  class="paginate" data="{{$paginate->currentPage()+1}}" > <button class="btn btn-primary"><i class="fa fa-angle-right"></i></button> </a>
          <a class="paginate" data="{{$paginate->lastPage()}}" > <button class="btn btn-default"><i class="fa fa-angle-double-right"></i></button> </a>
          @endif
            </div>
