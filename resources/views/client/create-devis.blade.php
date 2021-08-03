
@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}


<article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
<section class="col-md-10" style="background-color:#1b3744;margin-left:100px">

<div class="container" style="margin-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
        @endif
            <div class="card">
                    <div class="card text-white bg-primary mb-3" style="max-width: 61rem;">
                                    
                         <h3 class="text-center">Creer un devis</h3>       
                      </div>


                <div class="card-body">
               
                    <form method="POST" action="{{ route('devis.store') }}" id="form">
                        @csrf

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-left">{{ __('Choisissez un projet') }}</label>
                            <select class="form-control doshed" name="id_projet" required="required">
                               @foreach($projets as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                          </select>
                        </div>


                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-left">{{ __('Choisissez un contact') }}</label>

                            <select class="form-control doshed" name="id_contact" required="required">
                                  <option value="1">Contact1</option>
                                  <option value="2">Contact2</option>
                                  <option value="3">Contact3</option>
                                  <option value="4">Contact4<P/option>
                                  <option value="5">Contact5</option>
                           </select>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-left">{{ __('Type de devis') }}</label>

                            <select class="form-control doshed" name="type_devis" required="required">
                            <option value="devis-client">devis-client</option>
                                  <option value="devis-prestataire">devis-prestataire</option>
                                  <option value="devis-fournisseur">devis-fournisseur</option>
                                  <option value="devis-interne">devis-interne<P/option>
                           </select>
                        </div>


                        <div class="form-group row">
                            <label for="resume" class="col-md-4 col-form-label text-md-left">{{ __('Resume') }}</label>

                            <div class="col-md-12">
                                <textarea  type="textarea" class="form-control" name="resume"  required></textarea>
                            </div>
                        </div>


                        
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form><br><br><br>

                </div>
            </div>
        </div>
        
    </div>

   <div class="container">
   <div class="container">
    <div class="container text-white  mb-3" style="max-width: 61rem;">
    <form method="POST" action="{{ route('devis-lignes-store')}}" >

                    @csrf

                    <div class="container" style="margin-left:2px;">
                   
                    <table class="table table-striped">
                    <thead>
                    <tr>

                        <td>DESIGNATION</td>
                        <td>QTE</td>
                        <td>Unité</td>
                        <td>prix Unitaire</td>
                                              
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="designation" width="100%"/></td>

                        <td><input type="text" name="quantity" width="100%"/></td>


                        <td><input type="text" name="unite" width="100%" /></td>

                        <td><input type="text" name="prix_unitaire" width="100%" /></td>
                        
                    </tr>
                  
                    </tbody>
                </table>

                    <div class="input-group-append" style="margin-left:15px">
                    <button  type='submit' class="text-md-left;" style="background-color:purple;width:120px;color:white">Enregistrer</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                  </div>
                                

  </form>
</div>
    
</div>



</section>
</section>
</article>

@endsection
