@extends('layouts.app')

@section('content')
    <article class="container PersonnalData">
        <section class="row">

            @include('client.partials.sidenav',['users' => $users])

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                       
                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                    <h3 class="text-center">{{ $title }}</h3>       
                            </div>

                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
