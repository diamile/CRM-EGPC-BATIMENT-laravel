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
            <h2 class="text-center display-4" style="color:white">Liste des projets</h2><br>
           
            <form action="{{route('searchProjet')}}">
                
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

        <div style="display:flex;flex-direction:row;justify-content:space-between">

            <a class="btn btn-app bg-secondary" href="{{route('projets')}}">
                    <span class="badge bg-success">{{$allProjets}}</span>
                    <i class="fa fa-book"></i> Nombre de projet
            </a>
            <a class="btn btn-app bg-success">
                    <span class="badge bg-purple">{{$projetValid}}</span>
                    <i class="fas fa-users"></i> Projest validés
            </a>
            <a class="btn btn-app bg-danger">
                    <span class="badge bg-teal">{{$projetSecondOeuvre}}</span>
                    <i class="fa fa-book"></i> Second Oeuvre
            </a>
            <a class="btn btn-app bg-warning">
                    <span class="badge bg-info">{{$projetsGrosOeuvre}}</span>
                    <i class="fas fa-envelope"></i> Gros oeuvre
            </a>
            <a class="btn btn-app">
                    <span class="badge bg-info">{{$projetsAttente}}</span>
                    <i class="fas fa-envelope"></i> Projets en attente
            </a>
        </div>
</section>
  @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
  @endif

 
  <div class="card shadow my-5">
    <!-- <h4 class="card-header">Liste des Projets</h4> -->

   
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <!-- <th style="width: 1%">Type_devis</th>
            <th style="width: 20%">Resume</th>
            <th style="width: 30%">Id_projet</th> -->

            <th>Nom</th>
            
            <th>ville</th>
            <th>adresse</th>
            <th>responsable</th>
            <th>Project Progress </th>
            <th style="width: 8%" class="text-center">
                 Status
            </th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($projets as $projet)
          <tr>
            <td></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$projet->name}}</span></td>

            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:14px;"> {{ $projet->ville }}</span></td>

            <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{$projet->adresse}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$projet->responsable}}</span></td>

    
                 <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small style="padding:5px 10px;font-size:14px;">
                                    57% Complete
                                </small>
                </td>
                
                @if($projet->etat == "valide")
                <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">VALIDE</span></td>
                @elseif($projet->etat == "en_attente")
                <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">EN ATTENTE</span></td>
                @else
                <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">ENCOURS</span></td>
                @endif

            <td>
              <div class="btn-group btn-group-sm" role="group">
                <a href="{{ route('projet-details',$projet->id)}}"  class="btn btn-outline-dark"><i class="fas fa-eye"></i></a>
                <a href="{{ route('timeline',$projet->id)}}"  class="btn btn-outline-dark"><i class="fas fa-chart-line"></i></a>
                
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
              </div>
            </td>
          </tr>

          @endforeach
          
        </tbody>
      </table><br>
      {{$projets->links()}}
    </div>
    <div class="card-footer"></div>
  </div>
</div>
        
      <!-- /.card -->
</section>
</section>

</article>

@endsection
