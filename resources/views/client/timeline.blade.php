@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10">

 <div class="container">

 <section class="content">
        <div class="container-fluid">
        <div class="card">
            <h3 class="text-center display-4">Progression du  {{$projet->name}}</h3>
        </div>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h4>{{ Session::get('flash_message') }}</h4>
                </div>
            @endif
           
           
        </div>

        
</section>
  
  <div class="card shadow my-5">
    <!-- <h4 class="card-header">Liste des Devis</h4> -->
    
    <div class="card-body">
    <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            @foreach($travaux as $item)
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">{{$item->date_debut}}</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">{{$item->type_travaux}}</a></h3>

                  <div class="timeline-body">
                   {{$item->description}}
                  </div>
                  <div class="timeline-footer">
                  @if($item->etat == "valide")
                    <span class="float-right badge bg-success" style="padding:5px 10px;font-size:14px;margin-top:-5px">VALIDE</span>
                    @elseif($item->etat == "en_attente")
                    <span class="float-right badge bg-danger" style="padding:5px 10px;font-size:14px;margin-top:-5px">EN ATTENTE</span>
                    @else
                    <span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;margin-top:-5px">ENCOURS</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Responsable : {{$item->responsable_chantier}}</a></h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Prestataire : {{$item->prestataire}}</a> </h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                  </div>
                </div>
              </div>
             
            </div>
            @endforeach
          </div>
          <!-- /.col -->
        </div>
     
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
