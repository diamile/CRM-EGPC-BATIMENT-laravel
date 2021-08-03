@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
            <section class="col-md-10" style="margin-left:100px">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Creer une nouvelle contrainte</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('contrainte') }}">

                 @csrf
                 @method('POST')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">Titre</span></label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="titre">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">Type de contrainte</span></label>
                        <select class="form-control" name="type_contrainte">

                          @foreach($contraintes as $item)
                          <option value="{{$item}}">{{$item}}</option>
                          @endforeach


                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                    <label><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">Projet</span></label>
                        <select class="form-control" name="id_projet">
                          @foreach($projets as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                    

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label><span class="float-right badge bg-primary" style="padding:5px 10px;font-size:14px;">Description</span></label>
                        <textarea name="description"  class="form-control"></textarea>
                      </div>
                    </div>

                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Enregistrer</button>
                   </div>


                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>

            </section>
           

        </section>

    </article>
@endsection
