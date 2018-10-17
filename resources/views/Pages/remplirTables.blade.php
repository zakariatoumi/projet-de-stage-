@extends('Master.layout')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                      </div>
                
                @endif
            </div>
        </div>
    <div class="row">
        
        <div class="col-lg-4">
               
            <h3 class="font-weight-bold">Table pays : </h3>
            <form action="{{url('createPays')}}" method="POST">
                    {{ csrf_field() }}
                <label for="nomPays">Pays<span class="text-danger">*</span></label>
                <input type="text" name="nomPays" value="{{ old('nomPays')}}" class="form-control {{ $errors->has('nomPays') ? 'is-invalid' : '' }}" id="nomPays" placeholder="Pays">
                @if($errors->has('nomPays'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('nomPays')) }}
                    </div>
                @endif

                <button type="submit" class="btn btn-primary btn-md">Ajouter pays</button>
            </form>
        
        </div>

        
        <div class="col-lg-4">
            <h3 class="font-weight-bold">Table ville : </h3>

            <form action="{{url('createVille')}}" method="POST">
                    {{ csrf_field() }}
                        <label for="pays">Id pays<span class="text-danger">*</span></label>
                        <select value="{{ old('pays')}}" name="pays" id="pays" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('pays') ? 'is-invalid' : '' }}">
                            <option disabled selected>Id pays</option>
                            @foreach($pays as $payss)
                            <option value="{{ $payss->id }}">{{ $payss->nomPays }}</option>
                            @endforeach
                     
                        </select>
                        @if($errors->has('pays'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('pays')) }}
                        </div>
                    @endif
                        

                <label for="nomVille">Ville<span class="text-danger">*</span></label>
                <input type="text" name="nomVille" id="nomVille" value="{{ old('nomVille')}}" class="form-control {{ $errors->has('nomVille') ? 'is-invalid' : '' }}" placeholder="Ville">
                @if($errors->has('nomVille'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('nomVille')) }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-md">Ajouter ville</button>
            </form>
        </div>


        <div class="col-lg-4">
            <h3 class="font-weight-bold">Table type orgasime : </h3>
            <form action="{{url('createType_organisme')}}" method="POST">
                {{ csrf_field() }}
                <label for="type_org">Type orgasime<span class="text-danger">*</span></label>
                <input type="text" name="type_org" value="{{ old('type_org')}}" class="form-control {{ $errors->has('type_org') ? 'is-invalid' : '' }}" id="type_org" placeholder="Type orgasime">
                @if($errors->has('type_org'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('type_org')) }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-md">Ajouter type organisme</button>
            </form>
        </div>
        </div>

          <br>
          <br>
          <br>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="font-weight-bold">Table secteur : </h3>
            <form action="{{url('secteur')}}" method="POST">
                {{ csrf_field() }}
            <label for="secteur">Secteur<span class="text-danger">*</span></label>
            <input type="text" name="secteur" value="{{ old('secteur')}}" class="form-control {{ $errors->has('secteur') ? 'is-invalid' : '' }}" id="secteur" placeholder="Secteur">
            @if($errors->has('secteur'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('secteur')) }}
                </div>
            @endif

            <label for="discription">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('discription') ? 'is-invalid' : '' }}" name="discription" value="{{ old('discription')}}" id="discription" rows="5" placeholder="Description"></textarea>
                    @if($errors->has('discription'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('discription')) }}
                        </div>
                    @endif
            <button type="submit" class="btn btn-primary btn-md">Ajouter secteur</button>
        </form>
        </div>


        <div class="col-lg-6">
            <h3 class="font-weight-bold">Table sous secteur : </h3>
            <form action="{{url('Sosecteur')}}" method="POST">
                {{ csrf_field() }}
            
            <label for="secteur">Secteur<span class="text-danger">*</span></label>
            <select value="{{ old('secteurs')}}" name="secteurs" id="secteurs" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('secteurs') ? 'is-invalid' : '' }}">
                <option disabled selected>secteur</option>
                @foreach($secteur as $secteurs)
                <option value="{{ $secteurs->id }}">{{ $secteurs->secteur }}</option>
                @endforeach
                
            </select>
            @if($errors->has('secteurs'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('secteurs')) }}
                </div>
            @endif

            <label for="Ssecteur">Sous secteur<span class="text-danger">*</span></label>
            <input type="text" name="Ssecteur" value="{{ old('Ssecteur')}}" class="form-control {{ $errors->has('Ssecteur') ? 'is-invalid' : '' }}" id="Ssecteur" placeholder="Sous secteur">
            @if($errors->has('Ssecteur'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('Ssecteur')) }}
                </div>
            @endif

            <label for="description">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" value="{{ old('description')}}" id="description" rows="5" placeholder="Description"></textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('description')) }}
                        </div>
                    @endif
            <button type="submit" class="btn btn-primary btn-md">Ajouter Sous secteur</button>
        </form>
        </div>
    </div>

    </div>


@include('Pages.footer')
@endsection
