@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10">
 <div class="container">
  <div class="card shadow my-5">
    <h4 class="card-header">Liste des Utilisateurs</h4>
    <div class="card-body">
      <table class="table table-striped table-bordered table-hover table-responsive">
        <thead>
         
          <tr>
            <th>#</th>
            <th style="width: 1%">Name</th>
            <th style="width: 20%">Telephone</th>
            <th style="width: 30%">Statut</th>
            <th  style="width: 30%">Ville</th>
            
            <th data-sortable="false">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>1</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->phone}}</td>
            <td> @if ($user->is_admin)
                   {{$statut[0]}}
                 @else
                  {{$statut[1]}}
                @endif
            </td>
            <td>{{$user->ville}}</td>
            
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
    </div>
    <div class="card-footer"></div>
  </div>
</div>
        
      <!-- /.card -->

    </section>
           

        </section>


        
    </article>
@endsection
