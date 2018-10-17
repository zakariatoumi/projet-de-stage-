@extends('Master.layout')
@section('content')

<div class="container mt-5">
<!-- Card -->
<div class="card col-lg-6" style="margin: auto;position: relative;top: 50px">

    <!-- Card body -->
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
                        @csrf

        <!-- Material form register -->
        <form>
            <p class="h4 text-center py-4">{{ __('Registre') }}</p>

            <!-- Material input text nom -->
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="nom" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autofocus>
                @if ($errors->has('nom'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('nom') }}</strong>
                    </span>
                @endif
                <label for="nom" class="font-weight-light">{{ __('Nom') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input text prenom -->
            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="prenom" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" required>
                @if ($errors->has('prenom'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('prenom') }}</strong>
                    </span>
                @endif
                <label for="prenom" class="font-weight-light">{{ __('Prenom') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input text civil -->
            <div class="md-form">
                <!--<i class="fa fa-user prefix grey-text"></i>-->
                <i class="fa fa-vcard prefix grey-text" aria-hidden="true"></i>
                <input type="text" id="civil" class="form-control{{ $errors->has('civ') ? ' is-invalid' : '' }}" name="civ" value="{{ old('civ') }}" required>
                @if ($errors->has('civ'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('civ') }}</strong>
                    </span>
                @endif
                <label for="civil" class="font-weight-light">{{ __('Etat Civil') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input text tel -->
            <div class="md-form">
                <!--<i class="fa fa-user prefix grey-text"></i>-->
                <i class="fa fa-phone prefix grey-text" aria-hidden="true"></i>
                <input type="text" id="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required>
                @if ($errors->has('tel'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
                <label for="tel" class="font-weight-light">{{ __('Telephone') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input text poste -->
            <div class="md-form">
                <!--<i class="fa fa-user prefix grey-text"></i>-->
                <i class="fa fa-id-badge prefix grey-text" aria-hidden="true"></i>
                <input type="text" id="poste" class="form-control{{ $errors->has('poste') ? ' is-invalid' : '' }}" name="poste" value="{{ old('poste') }}" required>
                @if ($errors->has('poste'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('poste') }}</strong>
                    </span>
                @endif
                <label for="poste" class="font-weight-light">{{ __('Poste') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input email -->
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <label for="email" class="font-weight-light">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input password -->
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <label for="password" class="font-weight-light">{{ __('Password') }}<span class="text-danger">*</span></label>
            </div>

            <!-- Material input password comfirme -->
            <div class="md-form">
                <i class="fa fa-exclamation-triangle prefix grey-text"></i>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control">
                <label for="password-confirm" class="font-weight-light">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
            </div>

            <div class="text-center py-4 mt-3">
                <button class="btn btn-primary" type="submit">{{ __('Registre') }}</button>
            </div>
        </form>
        <!-- Material form register -->
</form>
    </div>
    <!-- Card body -->

</div>
<!-- Card -->
                      
</div>

@include('Pages.footer');
@endsection