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
            <h2 class="text-center display-4" style="color:white">Liste des contraintes par chantier </h2><br><br>

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
            @endif
           

            <form action="{{route('searchContraintes')}}">
                
                <div class="form-group">
                     <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" name="slug">
                        <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                        </div>
                 </div>
                 </div>
                
        </form>
        </div><br><br>

        <!-- <div style="display:flex;flex-direction:row;justify-content:space-between">

            <a class="btn btn-app bg-secondary" href="{{route('list-contraintes')}}">
                    <span class="badge bg-success">{{$contraintes->count()}}</span>
                    <i class="fa fa-book"></i> Listes des contraintes
            </a>
           
        </div> -->
</section>
  
  <div class="card shadow my-5">
    <!-- <h4 class="card-header">Liste des Devis</h4> -->
    
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">User</th>
            <th style="width: 20%">Titre</th>
            <th style="width: 20%">Projet</th>
            <th style="width: 20%">Etat</th>
            <th style="width: 20%">Type de contrainte</th>
            <th style="width: 30%">Description</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($contraintes as $item)
          <tr>
            <td></td>
            
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{ $item->user}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{ $item->titre}}</span></td>
            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:14px;">{{$item->projet->name}}</span></td>
            
            @if($item->etat == "valide")
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">VALIDE</span></td>
            @elseif($item->etat == "en_attente")
            <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">EN ATTENTE</span></td>
            @else
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">ENCOURS</span></td>
            @endif
           
            <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">{{$item->type_contrainte}}</span></td>
            <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{$item->description}}</span></td>
            
            
            <td>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                @if($item->is_valide == "1")
                <a href="{{route('edit-status-contrainte',$item->id)}}" class="btn btn-outline-success" id="is_valid"><i class="fas fa-square" style="color:green"></i></a>
                @else
                <a href="{{route('edit-status-contrainte',$item->id)}}" class="btn btn-outline-dark" id="is_not_valid"><i class="fas fa-square" ></i></a>
                @endif
                


              </div>
            </td>
          </tr>

          @endforeach
          
        </tbody>
      </table>
    
    </div>
    <div class="card-footer"></div>
  </div>
</div>
        
      <!-- /.card -->
</section>
</section>

</article>

@endsection
