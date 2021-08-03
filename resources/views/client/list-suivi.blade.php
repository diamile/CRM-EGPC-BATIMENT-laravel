@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10" style="background-color:#1b3744;margin-left:50px"><br>
<h2 class="text-center display-4" style="color:white">Liste des Suivis</h2><br>
 <div class="container">
  @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
  @endif

 
  <div class="card shadow my-5">
   
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive card-body">
        <thead>
         
          <tr>
            
            <th style="width: 20%">user</th>
            <th style="width: 10%">Description</th>
           
          </tr>
        </thead>
        <tbody>
        @foreach($suivis as $item)
          <tr>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{ $item->user}}</span></td>
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{ $item->action}}</span></td>
          </tr>

          @endforeach
          
        </tbody>
      </table>

      {{$suivis->links()}}
    </div>
    <div class="card-footer"></div>
  </div>
</div>
        
      <!-- /.card -->
</section>
</section>

</article>

@endsection
