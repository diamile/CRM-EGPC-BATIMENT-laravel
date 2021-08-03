@extends('layouts.app')

@section('content')

  {{--page qui affiche la page d'accueil coté administrateur--}}
  
    <article class="container-fluid">
        <section style="display:flex;flex-direction:row;justify-content:space-between;width:1500px;margin:0 auto;">

            <!-- @include('admin.partials.sidenav') -->
            @include('admin.partials.test')

            
          <section class="col-md-10" style="margin-left:100px;background-color:#1b3744;height:1500px">
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
                

                <form method="POST" action="{{ route('fileimport') }}" enctype="multipart/form-data">
                @csrf
                 @method('POST')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer form-check">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                 
                </div>
                <!-- /.card-body -->

                
              </form>
              </div>


              <div class="card-body" style="margin-top:300px;height:auto;color:white !important">
              <table class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                
                  <tr>
                  @if(count($headers))
                    @foreach($headers as $item)
                      <th style="width: 1%;color:white">{{$item}}</th>
                    @endforeach
                  @endif
                  </tr>
                </thead>
                <tbody>

                @foreach($csv as $item)
                 
                <tr>
                @foreach($item as $value)
                    <td>{{$value}}</td>
                @endforeach
                </tr>
                
                 @endforeach
                </tbody>
        
              </table>
              </div>



              <!-- /.card-body -->
            </div>

            </section>
           

        </section>


        
    </article>
@endsection



