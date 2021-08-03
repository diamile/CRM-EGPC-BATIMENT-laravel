@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
            <section class="col-md-10" style="margin-left:100px;">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Creer un nouveau projet</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('create-projet') }}">

                 @csrf
                 @method('POST')
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>nom du projet</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Type de projet</label>
                        <select class="form-control" name="type_projet">
                          <option>Gros oeuvre</option>
                          <option>Second oeuvre</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Adresse du projet</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="adresse">
                      </div>
                    </div>


                    <div class="form-group">
                        <label>Region</label>
                        <select class="form-control" name="ville">
                          <option>Dakar</option>
                          <option>Podor</option>
                          <option>Fatick</option>
                          <option>Ziguinchor</option>
                          <option>Fouta</option>
                          <option>Tambacounda</option>
                          <option>Kaolack</option>
                          <option>Kolda</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Responsable</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="responsable">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Numero de telephone</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="phone">
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

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Creer un nouveau projet</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('create-travaux') }}">

                 @csrf
                 @method('POST')
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Type de Travaux</label>
                        <select class="form-control" name="type_travaux">
                          <option>peinture</option>
                          <option>carrelage</option>
                          <option>plomberie</option>
                          <option>menuiserie</option>
                          <option>plafonnage</option>
                        </select>
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Projet</label>
                        <select class="form-control" name="id_projet">

                        @foreach($projets as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                         
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Type de chantier</label>
                        <select class="form-control" name="type_chantier">
                          <option>Gros oeuvre</option>
                          <option>Second oeuvre</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Custom Select Multiple Disabled</label>
                        <select multiple class="custom-select" name="is_current_projet">
                          <option value="oui">Oui</option>
                          <option value="non">Non</option>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Responsable de chantier</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="responsable">
                      </div>
                    </div>
                    <div>

                    <div class="row">
                    
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Date de debut</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="date-debut"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                   </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                    <label>Date de fin</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="date-fin"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                   </div>
                    </div>


                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Enregistrer</button>
                   </div>
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
