@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10" style="margin-left:100px;background-color:#1b3744">
 <div class="container">

 <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4" style="color:white">Liste des Decaissements</h2><br>
           
            <form action="{{route('searchDecaissement')}}">
                
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

            <a class="btn btn-app bg-danger" href="{{route('decaissements')}}">
                    <span class="badge bg-success">{{$decaissements->count()}}</span>
                    <i class="fa fa-book"></i> decaissements
            </a>
        </div>
</section>
  @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
  @endif

 
  <div class="card shadow my-5">
    
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">Contact</th>
            <th style="width: 20%">adresse</th>
            <th style="width: 30%">telephone</th>
            <th style="width: 1%">Montant</th>
            <th style="width: 20%">Prestation</th>
            <th style="width: 30%">Projet</th>
            <th style="width: 30%">prestataire</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($decaissements as $item)
          <tr>
            <td></td>
           
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->contact}}</span></td>
            <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{$item->adresse}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$item->telephone}}</span></td>
            <td><span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;">{{$item->montant}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$item->prestation}}</span></td>
            <td><span class="float-right badge bg-warning" style="padding:5px 10px;font-size:14px;">{{$item->projet}}</span></td>
            <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$item->prestataire}}</span></td>
            
            
            <td>
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-eye"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-outline-dark"><i class="fas fa-trash"></i></button>
                <a href="{{route('decaissement-pdf',$item->id)}}" class="btn btn-outline-dark"><i class="fas fa-file-pdf-o"></i></a>

                @if($item->is_valid == "1")
                <a href="{{route('decharge-pdf',$item->id)}}" class="btn btn-outline-dark"><i class="fas fa-file-pdf-o"></i></a>
                <a href="{{route('validateDecaissement',$item->id)}}" class="btn btn-outline-success" id="is_valid"><i class="fas fa-square" style="color:green"></i></a>
                
                @else
                <a href="{{route('validateDecaissement',$item->id)}}" class="btn btn-outline-dark" id="is_not_valid"><i class="fas fa-square" ></i></a>
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
