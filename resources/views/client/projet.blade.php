@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container">
        <section class="row">

            @include('admin.partials.test')

            <section class="col-md-8">


                <section class="panel panel-default">
                        <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                <h3 class="text-center">Liste des projets</h3>
                       </div>

                    <div class="panel-body">

                       @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        @if(Session::has('danger_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('danger_message') }}
                            </div>
                        @endif

                        <section class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>phone</th>
                                    <th>Statut</th>
                                    <th>ville</th>
                                    <th>adresse</th>
                                    <th>responsable</th>
                                    <th>
                                        Project Progress
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Status
                                    </th>
                                    <th>Actions</th>
                                    <th>Actions2</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projets as $projet)
                                    <tr>
                                       
                                        <td><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">{{$projet->name}}</span></td>

                                        <td><span class="float-right badge bg-secondary" style="padding:5px 10px;font-size:14px;">{{$projet->phone}}</span></td>

                                        <td>
                                         {{ $projet->statut }}       
                                        </td>

                                        <td>
                                         {{ $projet->ville }}       
                                        </td>

                                        <td>
                                         {{ $projet->adresse }}       
                                        </td>

                                        <td>
                                         {{ $projet->responsable }}       
                                        </td>
                                        <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small>
                                    57% Complete
                                </small>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>

                            <td>
                                <form method="POST" action="{{route('user_data.destroy',$projet->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                
                                        <a href="{{route('user_data.edit',$projet->id)}}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Voir/Modifier
                                                </a>

                                                <input type="submit" value="supprimer" class="btn btn-danger btn-xs"/>
                                                
                                                
                                            </form>
                                        </td>

                                        <td>
                                        
                                                
                                        <a href="{{route('generate-pdf',$projet->id)}}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Telecharger
                                                </a>

                                        </td>
                                    </tr>
                                @endforeach
                               
                                </tbody>
                            </table>

                            {{--affichage de ma pagination --}}

                            {{$users->links()}}

                        </section>



                    </div>
                </section>
            </section>
           

        </section>
    </article>
@endsection
