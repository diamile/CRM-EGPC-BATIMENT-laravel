@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
            <section class="col-md-10" style="margin-left:100px;background-color:#1b3744">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="card card-primary" style="margin-top:100px;height:400px">
              <div class="card-header">
                <h3 class="card-title">Creer un nouveau prestataire</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('create-prestataire') }}">

                 @csrf
                 @method('POST')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>nom</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Type de prestataire</label>
                        <select class="form-control" name="type_prestataire">
                          <option value="aluminium">Aluminium</option>
                          <option value="plomberie">Plomberie</option>
                          <option value="carrelage">Carrelage</option>
                          <option value="peinture" >Peinture</option>
                          <option value="faux plafond">Faux plafond</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Adresse du prestataire</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="adresse">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Numero de telephone</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="phone">
                      </div>
                    </div>

                    <div class="card-footer" style="margin-top:50px">
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


