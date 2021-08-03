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
            <h2 class="text-center display-4" style="color:white !important">Liste des devis</h2><br>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
            @endif
           
            <form action="{{route('search')}}">
                
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

            <a class="btn btn-app bg-secondary" href="{{route('devis-list')}}">
                    <span class="badge bg-success">{{$count}}</span>
                    <i class="fa fa-book"></i> Devis
            </a>
            <a class="btn btn-app bg-success">
                    <span class="badge bg-purple">{{$countdevisValide}}</span>
                    <i class="fas fa-users"></i> Devis validé
            </a>
            <a class="btn btn-app bg-danger">
                    <span class="badge bg-teal">{{$countDevisClient}}</span>
                    <i class="fa fa-book"></i> Devis clients
            </a>
            <a class="btn btn-app bg-warning">
                    <span class="badge bg-info">{{$countDevisFournisseur}}</span>
                    <i class="fas fa-envelope"></i> Devis fournisseur
            </a>
            <a class="btn btn-app">
                    <span class="badge bg-info">{{$countDevisInterne}}</span>
                    <i class="fas fa-envelope"></i> Devis interne
            </a>
        </div>
</section><br><br>

<!-- <div style="display:flex;flex-direction:row;justify-content:space-between;width:100%">

        @foreach($status as $item)
         
         <a  class="btn  btn-outline-primary"  href="{{route('filterdevis',$item)}}" > {{$item}}</a>
         
        @endforeach
           
</div> -->


@include('admin.partials.filterbutton',["data"=>$status,"path"=>'filterdevis'])
  
  
  <div class="card shadow my-5">
    <!-- <h4 class="card-header">Liste des Devis</h4> -->
    
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">Type_devis</th>
            <th style="width: 20%">Resume</th>
            <th style="width: 30%">Id_projet</th>
            <th style="width: 30%">Etat</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($devis as $item)
          <tr>
            <td></td>
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->type_devis}}</span></td>
            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:12px;">{{$item->resume}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$item->projet->name}}</span></td>
            @if($item->etat == "valide")
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">VALIDE</span></td>
            @elseif($item->etat == "en_attente")
            <td><span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;">EN ATTENTE</span></td>
            @elseif($item->etat == "encours")
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">ENCOURS</span></td>
            @endif
            
            <td>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                <a href="{{route('devis-pdf',$item->id)}}" class="btn btn-outline-dark"><i class="fas fa-file-pdf-o"></i></a>
                @if($item->is_valide == "oui")
                <a href="{{route('edit-status',$item->id)}}" class="btn btn-outline-success" id="is_valid"><i class="fas fa-square" style="color:green"></i></a>
                @else
                <a href="{{route('edit-status',$item->id)}}" class="btn btn-outline-dark" id="is_not_valid"><i class="fas fa-square" ></i></a>
                @endif


              </div>
            </td>
          </tr>

          @endforeach
          
        </tbody>
      </table>
      {{$devis->links()}}
    </div>
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
