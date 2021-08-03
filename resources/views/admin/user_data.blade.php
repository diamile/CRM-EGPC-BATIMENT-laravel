@extends('layouts.app')

{{--page qui permet de mofifier les données de l'utilisateur--}}
@section('content')
    <article class="container PersonnalData">
        <section class="row">

            @include('admin.partials.sidenav')

            <div class="col-md-8">
                <div class="panel panel-default">
                    
                    <div class="panel-body">

                            <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                                    
                                    <h3 class="text-center">Modification des  données</h3>       
                           </div>


                        <div class="col-md-12 card text-white bg-primary mb-3">
                               
                           @foreach($users as $user)
                                 
                    
                                    <div class="card-body">
                                        
                                    <form method="POST" action="{{route('user_data.update',$user->id)}}">
                                            @csrf
                                            @method('PATCH')
                    
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value=" {{$user->name}}" required autofocus>
                    
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                    
                                            <div class="form-group row">
                                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('lastName') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value=" {{$user->lastName}}" required autocomplete="lastName" autofocus>
                    
                                                    @error('lastName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                    
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value=" {{$user->email}}" required>
                    
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                    
                                            <div class="form-group row">
                                                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value=" {{$user->phone}}" required autocomplete="tel">
                    
                                                    @error('tel')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                    
                    
                                             <div class="form-group row">
                                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value=" {{$user->adresse}}" required autocomplete="address">
                    
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                    
                                            <div class="form-group row">
                                                <label for="postale" class="col-md-4 col-form-label text-md-right">{{ __('Code postale') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="postale" type="number" class="form-control @error('postale') is-invalid @enderror" name="postale" value="{{$user->postale}}" required autocomplete="postale">
                    
                                                    @error('postale')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$user->ville}}" required autocomplete="city">
                    
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                    
                    
                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" value=" {{$user->password}}"type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                    
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Modifier') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
