@extends('Master.layout')
@section('content')

<div class="container mt-5">

    
{{--
    @if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
              </div>
        @endif--}}

    <h3 class="text-center"><strong>Modifier une entreprise</strong></h3>
	
        <!-- Extended default form grid -->
        
        <form method="POST" action="{{ url('details/'.$modif->entrepriseId) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT"> 
            {{ csrf_field() }}
            <!-- Grid row -->
            <div class="form-row mt-5">
                <!-- Default input -->
                <div class="form-group col-md-6 {{ $errors->has('raisonSociale') ? 'has-error' : '' }}">
                    <label for="raisonsociale">Raison sociale<span class="text-danger">*</span></label>
                    <input type="text" name="raisonSociale" value="{{$modif->raisonSociale}}" class="form-control {{ $errors->has('raisonSociale') ? 'is-invalid' : '' }}" id="raisonsociale" placeholder="Raison sociale">
                    @if($errors->has('raisonSociale'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('raisonSociale')) }}
                        </div>
                    @endif
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="capital">Capital</label>
                    <input type="text" name="capital" value="{{$modif->capital}}" class="form-control" id="capital" placeholder="Capital">
                </div>
            </div>
            <!-- Grid row -->
                              
            <!-- Default input -->
            <div class="form-group">
                    <label for="discription">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('discription') ? 'is-invalid' : '' }}" name="discription" id="discription" rows="5" placeholder="Description">{{ Input::old('discription') ? old('discription') : $modif->discription }}</textarea>
                    @if($errors->has('discription'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('discription')) }}
                        </div>
                    @endif
                </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="inputAddress2">Address<span class="text-danger">*</span></label>
                <input type="text" name="adresse" value="{{$modif->adresse}}" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="inputAddress2" placeholder="Address">
                @if($errors->has('adresse'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('adresse')) }}
                        </div>
                    @endif
            </div>
            
            <!-- Grid row -->
            <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="site">Site Web</label>
                    <input type="text" name="siteWeb" value="{{$modif->siteWeb}}" class="form-control {{ $errors->has('siteWeb') ? 'is-invalid' : '' }}" id="site" placeholder="Site Web">
                    @if($errors->has('siteWeb'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('siteWeb')) }}
                        </div>
                    @endif
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                        
                        
                    <label for="logo">Logo</label>
                    <div class="row">
                    <div class="col text-right"><img src="/storage/cover_images/{{ $modif->logo }}" alt="avatar mx-auto white" class="rounded-circle img-fluid" width="50" height="50"></div>
                   <div class="col-md-10"> <input type="file" name="logo" value="{{$modif->logo}}" class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo" placeholder="Logo"/>
                    @if($errors->has('logo'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('logo')) }}
                        </div>
                    @endif
                </div>
            </div>
                </div>
                
            </div>

            <!-- Grid row -->
            <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-4">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="tel" value="{{$modif->tel}}" class="form-control" id="telephone" placeholder="Telephone">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{$modif->email}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('email')) }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" value="{{$modif->fax}}" class="form-control" id="fax" placeholder="Fax">
                    </div>
            </div>
            <!-- Grid row -->

            <!-- Grid row -->

            <div class="form-row">


                    <!--Grid column-->
                    <div class="form-group col-md-4">
            
                        <!--Blue select-->
                        <label for="pays">Pays<span class="text-danger">*</span></label>
                        <select name="pays" id="pays" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('pays') ? 'is-invalid' : '' }}">
                            <option disabled selected>Pays</option>
                            @foreach($pays as $payss)
                            <option value="{{ $payss->id }}"
                                @if($payss->id === $modif->pays_id)
                                selected
                                @endif
                                >{{ $payss->nomPays }}</option>
                            @endforeach
                        </select>
                        <!--/Blue select-->
                        @if($errors->has('pays'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('pays')) }}
                        </div>
                    @endif
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="form-group col-md-4">
            
                        <!--Name-->
                        <label for="vil">Ville<span class="text-danger">*</span></label>
                        <select value="{{ old('ville')}}" id="vil" name="ville" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('ville') ? 'is-invalid' : '' }}">
                            <option disabled selected>Ville</option>
                            @foreach($ville as $villes)
                            <option value="{{ $villes->id }}"
                                    @if($villes->id === $modif->ville_id)
                                    selected
                                    @endif
                                >{{ $villes->nomVille }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ville'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('ville')) }}
                        </div>
                    @endif
                    </div>
                    <!--Grid column-->
            
                    <!--Grid column-->
                    <div class="form-group col-md-4">
            
                        <!--Blue select-->
                        <label for="organ">Type organisme<span class="text-danger">*</span></label>
                        <select name="organ" id="organ" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('organ') ? 'is-invalid' : '' }}">
                            <option disabled selected>Organisme</option>
                            @foreach($org as $orgns)
                            <option value="{{ $orgns->id }}"
                                    @if($orgns->id === $modif->type_org_id)
                                    selected
                                    @endif
                                >{{ $orgns->type_org }}</option>
                            @endforeach
                        </select>
                        <!--/Blue select-->
                        @if($errors->has('organ'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('organ')) }}
                        </div>
                    @endif
                    </div>
                    <!--Grid column-->
            
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="form-row">
                        <!--Grid column-->
                        <div class="form-group col-md-4">
                
                            <!--Blue select-->
                            <label for="secteur">Secteur<span class="text-danger">*</span></label>
                            <select value="{{ old('secteur')}}" name="secteur" id="secteur" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('secteur') ? 'is-invalid' : '' }}">
                                <option disabled selected>Secteur</option>
                                @foreach($secteurs as $secteur)
                                <option value="{{ $secteur->id }}"
                                        @if($secteur->id === $modif->secteur_id)
                                        selected
                                        @endif
                                        >{{ $secteur->secteur }}</option>
                                @endforeach
                            </select>
                            <!--/Blue select-->
                            @if($errors->has('secteur'))
                            <div class="invalid-feedback">
                                {{ implode(',', $errors->get('secteur')) }}
                            </div>
                        @endif
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="form-group col-md-4">
                
                            <!--Blue select-->
                            <label for="Ssecteurs">Sous secteurs<span class="text-danger">*</span></label>
                            <select value="{{ old('Ssecteurs')}}" name="Ssecteurs" id="Ssecteurs" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('Ssecteurs') ? 'is-invalid' : '' }}">
                                <option disabled selected>Sous secteur</option>
                                @foreach($Ssecteurs as $Ssecteur)
                                <option value=""
                                @if($Ssecteur->id === $modif->secteur_id)
                                        selected
                                        @endif
                                        >{{ $Ssecteur->Ssecteur }}</option>
                                        @endforeach
                            </select>
                            <!--/Blue select-->
                            @if($errors->has('Ssecteurs'))
                            <div class="invalid-feedback">
                                {{ implode(',', $errors->get('Ssecteurs')) }}
                            </div>
                        @endif
                        </div>
                        <!--Grid column-->
                </div>

                <!--Grid row-->
                <button type="submit" class="btn btn-primary btn-md">Modifier</button>
            </form>
           
        <!-- Extended default form grid -->        


</div>

                @include('Pages.footer');
@endsection



