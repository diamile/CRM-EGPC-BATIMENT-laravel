<div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">

@foreach($data as $item)
<a  class="btn  btn-outline-primary " href="{{route($path,$item)}}" > {{$item}}</a>
@endforeach
   
</div>