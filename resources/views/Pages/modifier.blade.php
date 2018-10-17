@extends('Master.layout')
@section('content')

<div class="container mt-5">

    

    <h3 class="text-center"><strong>Modifier votre compte</strong></h3>
	
        <!-- Extended default form grid -->
        
        <form method="POST" action="{{url('compte/'.$modifCompte->id)}}">
            <input type="hidden" name="_method" value="PUT"> 
                {{ csrf_field() }}
                
            <!-- Grid row -->
            <div class="form-row mt-5">
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="nom">Nom<span class="text-danger">*</span></label>
                    <input type="text" name="nom" value="{{$modifCompte->nom}}" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" id="nom" placeholder="Nom">
                    @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('nom')) }}
                    </div>
                @endif
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="prenom">Prenom<span class="text-danger">*</span></label>
                    <input type="text" name="prenom" value="{{$modifCompte->prenom}}" class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" id="prenom" placeholder="Prenom">
                    @if($errors->has('prenom'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('prenom')) }}
                    </div>
                @endif
                </div>
            </div>
            <!-- Grid row -->
                              
            <!-- Default input -->
            <div class="form-group">
                    <label for="civ">Etat Civil<span class="text-danger">*</span></label>
                    <input type="text" name="civ" value="{{$modifCompte->civ}}" class="form-control {{ $errors->has('civ') ? 'is-invalid' : '' }}" id="civ" placeholder="Etat Civil">
                    @if($errors->has('civ'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('civ')) }}
                    </div>
                @endif
                </div>
            
            
            <!-- Grid row -->
            <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="poste">Poste<span class="text-danger">*</span></label>
                    <input type="text" name="poste" value="{{$modifCompte->poste}}" class="form-control {{ $errors->has('poste') ? 'is-invalid' : '' }}" id="poste" placeholder="Poste">
                    @if($errors->has('poste'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('poste')) }}
                    </div>
                @endif
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="Email">Email<span class="text-danger">*</span></label>
                    <input type="text" name="Email" value="{{$modifCompte->Email}}" class="form-control {{ $errors->has('Email') ? 'is-invalid' : '' }}" id="Email" placeholder="Email">
                    @if($errors->has('Email'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('Email')) }}
                    </div>
                @endif
                </div> 

            </div>

            <!-- Default input -->
                <div class="form-group">
                    <label for="Tel">Telephone<span class="text-danger">*</span></label>
                    <input type="text" name="Tel" value="{{$modifCompte->Tel}}" class="form-control {{ $errors->has('Tel') ? 'is-invalid' : '' }}" id="Tel" placeholder="Telephone">
                    @if($errors->has('Tel'))
                    <div class="invalid-feedback">
                        {{ implode(',', $errors->get('Tel')) }}
                    </div>
                @endif
                </div>
                
                <!--Grid row-->
                <button type="submit" class="btn btn-primary btn-md">Modifier</button>
            </form>
            
            </div>

           
        <!-- Extended default form grid -->        


</div>

                @include('Pages.footer');
@endsection



