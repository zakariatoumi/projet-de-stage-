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
    
              @if(isset($modifpays)) 
              <div class="row">
        
                    <div class="col-lg-6 w-responsive mx-auto">
            <h3 class="font-weight-bold">Table pays : </h3>
            
            <form method="POST" action="{{ url('pays/'.$modifpays->id) }}">
                <input type="hidden" name="_method" value="PUT"> 
                    {{ csrf_field() }}
                <label for="nomPays">Pays<span class="text-danger">*</span></label>
                <input type="text" name="nomPays" value="{{ $modifpays->nomPays }}" class="form-control {{ $errors->has('nomPays') ? 'is-invalid' : '' }}" id="nomPays" placeholder="Pays">
                @if($errors->has('nomPays'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('nomPays')) }}
                    </div>
                @endif

                <button type="submit" class="btn btn-primary btn-md">Modifier pays</button>
            </form>
        
        </div>
    </div>
@endif

        
                @if(isset($modifvilles)) 
                <div class="row">
                        <div class="col-lg-6 w-responsive mx-auto">
            <h3 class="font-weight-bold">Table ville : </h3>

            <form action="{{url('villes/'.$modifvilles->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT"> 
                    {{ csrf_field() }}
                        <label for="pays">Id pays<span class="text-danger">*</span></label>
                        <select name="pays" id="pays" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('pays') ? 'is-invalid' : '' }}">
                            <option disabled selected>Id pays</option>
                            @foreach($pays as $payss)
                            <option value="{{ $payss->id }}"
                                    @if($payss->id === $modifvilles->pays_id)
                                    selected
                                    @endif
                                >{{ $payss->nomPays }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pays'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('pays')) }}
                        </div>
                    @endif
                        

                <label for="nomVille">Ville<span class="text-danger">*</span></label>
                <input type="text" name="nomVille" id="nomVille" value="{{ $modifvilles->nomVille }}" class="form-control {{ $errors->has('nomVille') ? 'is-invalid' : '' }}" placeholder="Ville">
                @if($errors->has('nomVille'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('nomVille')) }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-md">Modifier ville</button>
            </form>
        </div>
    </div>
@endif

@if(isset($modiftypeOrg)) 
<div class="row">
        <div class="col-lg-6 w-responsive mx-auto">
            <h3 class="font-weight-bold">Table type orgasime : </h3>
            <form action="{{url('typeOrg/'.$modiftypeOrg->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <label for="type_org">Type orgasime<span class="text-danger">*</span></label>
                <input type="text" name="type_org" value="{{ $modiftypeOrg->type_org }}" class="form-control {{ $errors->has('type_org') ? 'is-invalid' : '' }}" id="type_org" placeholder="Type orgasime">
                @if($errors->has('type_org'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('type_org')) }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary btn-md">Modifier type organisme</button>
            </form>
        </div>
    </div>
   @endif     

          
   @if(isset($modifsecteur)) 
    <div class="row">
        <div class="col-lg-6 w-responsive mx-auto">
            <h3 class="font-weight-bold">Table secteur : </h3>
            <form action="{{url('secteur/'.$modifsecteur->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
            <label for="secteur">Secteur<span class="text-danger">*</span></label>
            <input type="text" name="secteur" value="{{ $modifsecteur->secteur }}" class="form-control {{ $errors->has('secteur') ? 'is-invalid' : '' }}" id="secteur" placeholder="Secteur">
            @if($errors->has('secteur'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('secteur')) }}
                </div>
            @endif

            <label for="discription">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('discription') ? 'is-invalid' : '' }}" name="discription" id="discription" rows="5" placeholder="Description">{{ $modifsecteur->discription }}</textarea>
                    @if($errors->has('discription'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('discription')) }}
                        </div>
                    @endif
            <button type="submit" class="btn btn-primary btn-md">Modifier secteur</button>
        </form>
        </div>
    </div>
    @endif

    @if(isset($modifSsecteur)) 
    <div class="row">
        <div class="col-lg-6 w-responsive mx-auto">
            <h3 class="font-weight-bold">Table sous secteur : </h3>
            <form action="{{url('Ssecteur/'.$modifSsecteur->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
            
            <label for="secteur">Secteur<span class="text-danger">*</span></label>
            <select name="secteur" id="secteur" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('secteur') ? 'is-invalid' : '' }}">
                <option disabled selected>secteur</option>
               
               @foreach($secteurs as $secteur) 
                <option value="{{ $secteur->id }}"
                        @if($secteur->id === $modifSsecteur->secteur_id)
                        selected
                        @endif
                    >{{ $secteur->secteur }}</option>
                @endforeach
                
            </select>
            @if($errors->has('secteur'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('secteur')) }}
                </div>
            @endif

            <label for="Ssecteur">Sous secteur<span class="text-danger">*</span></label>
            <input type="text" name="Ssecteur" value="{{ $modifSsecteur->Ssecteur }}" class="form-control {{ $errors->has('Ssecteur') ? 'is-invalid' : '' }}" id="Ssecteur" placeholder="Sous secteur">
            @if($errors->has('Ssecteur'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('Ssecteur')) }}
                </div>
            @endif

            <label for="description">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" rows="5" placeholder="Description">{{ $modifSsecteur->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('description')) }}
                        </div>
                    @endif
            <button type="submit" class="btn btn-primary btn-md">Modifier Sous secteur</button>
        </form>
        </div>
    </div>
    @endif

    @if(isset($modifPublication)) 
    <div class="row">
            <div class="col-lg-6 w-responsive mx-auto">
<h3 class="font-weight-bold">Modifier publication : </h3>

<form action="{{url('index/'.$modifPublication->id)}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
        {{ csrf_field() }}
        <label for="titre">Titre<span class="text-danger">*</span></label>
        <input type="text" name="titre" value="{{ $modifPublication->titre }}" class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" id="titre" placeholder="Titre">
            @if($errors->has('titre'))
            <div class="invalid-feedback">
                {{ implode(',', $errors->get('titre')) }}
            </div>
        @endif
            

        <label for="body">Body<span class="text-danger">*</span></label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="5" placeholder="Body">{{ $modifPublication->body }}</textarea>
        @if($errors->has('body'))
            <div class="invalid-feedback">
                {{ implode(',', $errors->get('body')) }}
            </div>
        @endif
    <button type="submit" class="btn btn-primary btn-md">Modifier publication</button>
</form>
</div>
</div>
@endif

@if(isset($modifPublication1)) 
    <div class="row">
            <div class="col-lg-6 w-responsive mx-auto">
<h3 class="font-weight-bold">Modifier publication : </h3>

<form action="{{url('Apublication/'.$modifPublication1->id)}}" method="POST">
    <input type="hidden" name="_method" value="PUT"> 
        {{ csrf_field() }}
        <label for="titre">Titre<span class="text-danger">*</span></label>
        <input type="text" name="titre" value="{{ $modifPublication1->titre }}" class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" id="titre" placeholder="Titre">
            @if($errors->has('titre'))
            <div class="invalid-feedback">
                {{ implode(',', $errors->get('titre')) }}
            </div>
        @endif
            

        <label for="body">Body<span class="text-danger">*</span></label>
        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="5" placeholder="Body">{{ $modifPublication1->body }}</textarea>
        @if($errors->has('body'))
            <div class="invalid-feedback">
                {{ implode(',', $errors->get('body')) }}
            </div>
        @endif
    <button type="submit" class="btn btn-primary btn-md">Modifier publication</button>
</form>
</div>
</div>
@endif

    </div>


@include('Pages.footer')
@endsection
