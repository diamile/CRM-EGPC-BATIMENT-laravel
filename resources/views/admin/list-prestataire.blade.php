@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10" style="background-color:#1b3744;margin-left:50px">

 <div class="container">

 <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4" style="color:white">Liste des Prestataires</h2><br>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
            @endif
           
            <form action="{{route('searchPrestataire')}}">
                
                    <div class="form-group">
                         <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Entrer un prestataire" name="slug">
                            <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                            </div>
                     </div>
                     </div>
                    
            </form>
        </div>

        
</section>

<!-- <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">

        @foreach($type_prestataires as $item)
        <a  class="btn  btn-outline-dark " href="{{route('filterPrestataire',$item)}}" > {{$item}}</a>
        @endforeach
           
  </div> -->
  <br>
  @include('admin.partials.filterbutton',["data"=>$type_prestataires,"path"=>'filterPrestataire'])
  
  <div class="card shadow my-5">
    <!-- <h4 class="card-header">Liste des Devis</h4> -->
    @if($prestataires->count()>0)
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">Nom</th>
            <th style="width: 20%">Type de prestataire</th>
            <th style="width: 30%">adresse</th>
            <th style="width: 30%">Telephone</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($prestataires as $item)
          <tr>
            <td></td>
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->name}}</span></td>
            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:12px;">{{$item->type_prestataire}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$item->adresse}}</span></td>
            <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{$item->telephone}}</span></td>
            <td>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-file-pdf-o"></i></button>
              </div>
            </td>
          </tr>

          @endforeach
          
        </tbody>
      </table>
      {{$prestataires->links()}}
    </div>
    @else
    <div class="alert alert-warning alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fas fa-check"></i> Alert!</h5>
             <span style="font-size:20px;padding:5px 10px;">Ce type de prestataire n'existe pas.</span>
     </div>
     @endif

    <div class="card-footer">
    <a  class="btn btn-primary" href="{{ url()->previous() }}">Precedent</a>
    </div>
  </div>
</div>
        
      <!-- /.card -->
</section>
</section>

</article>

@endsection
