@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10" style="margin-left:100px;background-color:#1b3744">
<h2 class="text-center display-4" style="color:white">Projet {{ $projet->name}}</h2><br>
 <div class="container">
  @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
  @endif

 
  <div class="card shadow my-5">
   
    <div class="card-body">

    <div class="row">
    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Description du projet
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">nom</dt>
                  <dd class="col-sm-8">{{$projet->name}}</dd>


                  <dt class="col-sm-4">adresse</dt>
                  <dd class="col-sm-8">{{$projet->adresse}}</dd>

                  <dt class="col-sm-4">Statut du projet</dt>
                  <dd class="col-sm-8">
                 
                  @if($projet->etat == "valide")
                  <span class="badge bg-success" style="padding:5px 10px;font-size:14px;">VALIDE</span>
                  @elseif($projet->etat == "en_attente")
                  <span class="badge bg-danger" style="padding:5px 10px;font-size:14px;">EN ATTENTE</span>
                  @elseif($projet->etat == "encours")
                  <span class="badge bg-primary" style="padding:5px 10px;font-size:14px;">ENCOURS</span>
                  @endif
                  </dd>

                  <dt class="col-sm-4">Ville</dt>
                  <dd class="col-sm-8">{{$projet->ville}}</dd>

                  <dt class="col-sm-4">Responsable</dt>
                  <dd class="col-sm-8">{{$projet->responsable}}</dd>

                  <dt class="col-sm-4">Telephone</dt>
                  <dd class="col-sm-8">{{$projet->phone}}</dd>

                  <dt class="col-sm-4">Type de projet</dt>
                  <dd class="col-sm-8">
                  
                  <span class="badge bg-success" style="padding:5px 10px;font-size:14px;">{{$projet->type_projet}}</span>
                  </dd>

                  <dt class="col-sm-4">Date de creation</dt>
                  <dd class="col-sm-8">{{$projet->created_at}}</dd>
                </dl>
              </div>

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>

    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Listes des travaux associés à ce projet
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
        @if($travaux->count())
              <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">Type de travaux</th>
            <th style="width: 20%">responsable</th>
            <th style="width: 30%">etat</th>
            <th style="width: 30%">date de debut</th>
            <th style="width: 30%">date de fin</th>
            <th style="width: 30%">Travaux validés</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
      
        @foreach($travaux as $item)
          <tr>
            <td></td>
            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:14px;">{{$item->type_travaux}}</span></td>
            <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{ $item->responsable_chantier}}</span></td>

            @if($item->etat == "valide")
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">VALIDE</span></td>
            @elseif($item->etat == "en_attente")
            <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">EN ATTENTE</span></td>
            @else
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">ENCOURS</span></td>
            @endif

            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->date_debut}}</span></td>
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->date_fin}}</span></td>


             @if($item->is_valid == 1)
             <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">OUI</span></td>
             @else
             <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">NON</span></td>
             @endif


            
            <td>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                <a href="{{route('devis-pdf',$item->id)}}" class="btn btn-outline-dark"><i class="fas fa-file-pdf-o"></i></a>
                @if($item->is_valid == "1")
                <a href="{{route('edit-status_travaux',$item->id)}}" class="btn btn-outline-success" id="is_valid"><i class="fas fa-square" style="color:green"></i></a>
                @else
                <a href="{{route('edit-status_travaux',$item->id)}}" class="btn btn-outline-dark" id="is_not_valid"><i class="fas fa-square" ></i></a>
                @endif 


              </div>
            </td>
          </tr>

          @endforeach
          @else

         
          
        </tbody>
      </table>
      
      <div class="alert alert-warning alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fas fa-check"></i> Alert!</h5>
             <span style="font-size:20px;padding:5px 10px;">Ce projet n'a pas de travaux veuillez ajouter les travaux</span>
     </div>
        @endif
              </div>

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
    <div class="card-footer"></div>
  </div>
</div>
        
      <!-- /.card -->
</section>
</section>

</article>

@endsection
