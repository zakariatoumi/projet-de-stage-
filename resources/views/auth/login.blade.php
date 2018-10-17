@extends('Master.layout')
@section('content')

<div class="container">
	<div class="row mt-5" style="position: relative;top: 50px">
    <div class="col">
    	<h3 class="font-weight-bold">B2B Africa :</h3>
      <p><strong class="font-weight-bold">Première plateforme de réseautage destinée aux entreprises africaines. Notre mission est de mettre en valeur les potentiels du continent et promouvoir le commerce interAfricain.

            B2B Africa met au service des acteurs économiques de l’Afrique, Privés et publiques, un espace de collaboration et de partage permettant :<br/>
            
            -       La mise en relation des acteurs et initiation des partenariats.<br/>
            
            -       La valorisation des potentiels et la publication des opportunités d’investissement.<br/>
            
            -       La publication des programmes de financement et de promotion de l’investissement.</strong></p>
    </div>
    <div class="col">
      
<section class="form-simple">

    <!--Form with header-->
    <div class="card">

        <!--Header-->
        <div class="header pt-3 grey lighten-2">

            <div class="row d-flex justify-content-start">
                <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">{{ __('Connecter votre compte') }}</h3>
            </div>

        </div>
        <!--Header-->

        <div class="card-body mx-4 mt-4">
            <form method="POST" action="{{ route('login') }}">
                        @csrf

            <!--Body-->
            
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                
                <label for="email">{{ __('E-Mail Address') }}</label>
            </div>
            <br>

            <div class="md-form pb-3">
                <i class="fa fa-lock prefix grey-text"></i>
                <input id="password" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label for="Mot de passe">{{ __('Mot de passe') }}</label>

                {{--<p class="font-small grey-text d-flex justify-content-end">Oublié <a href="{{ route('password.request') }}" class="dark-grey-text font-weight-bold ml-1"> {{ __(' Votre mot de passe?') }}</a></p>--}}
            </div>

            {{--<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <!--<div class="checkbox">
                                    <label>
                                        <input class="form-check-input filled-in" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>-->

                            <!-- Default checkbox -->
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="checkbox" id="inlineFormCheckbox1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineFormCheckbox1">{{ __('Remember Me') }}</label>
                            </div>
                            </div>

                            
                        </div>--}}
 <br>
 <br>

            <div class="text-center mb-4">
               
                <button type="submit" class="btn btn-primary btn-block z-depth-2">
                  {{ __('Connexion') }}
                </button>

            </div>
            <p class="font-small grey-text d-flex justify-content-center">Vous n'avez pas de compte? <a href="{{url('registre')}}" class="dark-grey-text font-weight-bold ml-1"> {{ __('S\'inscrire') }}</a></p>

          </form>
        </div>

    </div>
    <!--/Form with header-->

</section>
            
</div>
</div>
@include('Pages.footer');
@endsection