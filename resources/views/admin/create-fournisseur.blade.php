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
            <div class="card card-primary" style="height:400px;margin-top:100px">
              <div class="card-header">
                <h3 class="card-title">Creer un nouveau fournisseur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('create-fournisseur') }}">

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
                        <label>Type de fournisseur</label>
                        <select class="form-control" name="type_fournisseur">
                          <option value="fer">Fer</option>
                          <option value="beton">Béton</option>
                          <option value="sable">Sable</option>
                          <option value="peinture" >Peinture</option>
                          <option value="ciment">Ciment</option>
                          <option value="bois">Bois</option>
                          <option value="brique">Brique</option>
                          <option value="chaussure de securite">chaussure de securité</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Adresse du fournisseur</label>
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


