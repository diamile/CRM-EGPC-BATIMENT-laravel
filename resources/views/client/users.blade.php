@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row">

            @include('client.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                            @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        @foreach($users as $user)
                       

                          @endforeach
                        <section class="container">
                                <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                        <h3 class="text-center">Bonjour {{$user->name}} voici vos donnée personnelles </h3>        
                        </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th>C.postale</th>
                                    <th>Ville</th>
                                    <th>Commentaire</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->lastName}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->phone}}
                                        </td>

                                        <td>
                                            {{$user->adresse}}
                                        </td>

                                        <td>
                                            {{$user->postale}}
                                        </td>

                                        <td>
                                            {{$user->ville}}
                                        </td>

                                        <td>
                                            {{$user->commentaire}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </section>

                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
