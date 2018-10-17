@extends('Master.layout')
@section('content')

<div class="container mt-5">

       {{--@if(count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
              </div>
        @endif--}}

    <h3 class="text-center"><strong>Ajouter une entreprise</strong></h3>
	
        <!-- Extended default form grid -->
        
        <form method="POST" action="{{url('createEntreprise')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- Grid row -->
            <div class="form-row mt-5">
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="raisonsociale">Raison sociale<span class="text-danger">*</span></label>
                    <input type="text" name="raisonSociale" value="{{ old('raisonSociale')}}" class="form-control {{ $errors->has('raisonSociale') ? 'is-invalid' : '' }}" id="raisonsociale" placeholder="Raison sociale">
                    @if($errors->has('raisonSociale'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('raisonSociale')) }}
                        </div>
                    @endif
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="capital">Capital</label>
                    <input type="text" name="capital" value="{{ old('capital')}}" class="form-control" id="capital" placeholder="Capital">
                </div>
            </div>
            <!-- Grid row -->
                              
            <!-- Default input -->
            <div class="form-group">
                    <label for="discription">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control {{ $errors->has('discription') ? 'is-invalid' : '' }}" name="discription" value="{{ old('discription')}}" id="article-ckeditor" rows="5" placeholder="Description"></textarea>
                    @if($errors->has('discription'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('discription')) }}
                        </div>
                    @endif
                </div>
            <!-- Default input -->
            <div class="form-group">
                <label for="inputAddress2">Address<span class="text-danger">*</span></label>
                <input type="text" name="adresse" value="{{ old('adresse')}}" class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" id="inputAddress2" placeholder="Address">
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
                    <input type="text" name="siteWeb" value="{{ old('siteWeb')}}" class="form-control" id="site" placeholder="Site Web">
                   
                </div>
                <!-- Default input -->
                <div class="form-group col-md-6">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" value="{{ old('logo')}}" class="form-control" id="logo" placeholder="Logo">
                </div>
            </div>

            <!-- Grid row -->
            <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-4">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="tel" value="{{ old('tel')}}" class="form-control" id="telephone" placeholder="Telephone">
                </div>
                <!-- Default input -->
                <div class="form-group col-md-4">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('email')) }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-4">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" value="{{ old('fax')}}" class="form-control" id="fax" placeholder="Fax">
                    </div>
            </div>
            <!-- Grid row -->

            <div class="form-row">


                    <!--Grid column-->
                    <div class="form-group col-md-4">
            
                        <!--Blue select-->
                        <label for="pays">Pays<span class="text-danger">*</span></label>
                        <select value="{{ old('pays')}}" name="pays" id="pays" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('pays') ? 'is-invalid' : '' }}">
                            <option disabled selected>Pays</option>
                            @foreach($pay as $pays)
                            <option value="{{ $pays->id }}">{{ $pays->nomPays }}</option>
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
                        <select value="{{ old('ville')}}" name="ville" id="vil" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('ville') ? 'is-invalid' : '' }}">
                            <option disabled selected>Ville</option>
                            <option value=""></option>
                            
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
                        <select value="{{ old('organ')}}" name="organ" id="organ" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('organ') ? 'is-invalid' : '' }}">
                            <option disabled selected>Organisme</option>
                            @foreach($org as $orgns)
                            <option value="{{ $orgns->id }}">{{ $orgns->type_org }}</option>
                            @endforeach
                        </select>
                        <!--/Blue select-->
                        @if($errors->has('organ'))
                        <div class="invalid-feedback">
                            {{ implode(',', $errors->get('organ')) }}
                        </div>
                    @endif
                    </div>
                </div>
                
                <!--Grid row-->
                <div class="form-row">
                        <!--Grid column-->
                        <div class="form-group col-md-4">
                
                            <!--Blue select-->
                            <label for="secteur">Secteur<span class="text-danger">*</span></label>
                            <select value="{{ old('secteur')}}" name="secteur" id="secteur" class="browser-default form-control colorful-select dropdown-primary {{ $errors->has('secteur') ? 'is-invalid' : '' }}">
                                <option disabled selected>Secteur</option>
                                @foreach($secteurs as $secteur)
                                <option value="{{ $secteur->id }}">{{ $secteur->secteur }}</option>
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
                                <option value=""></option>
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
                <button type="submit" class="btn btn-primary btn-md">Ajouter</button>
        <!-- Extended default form grid -->        
        </form>
</div>

@include('Pages.footer');


@endsection

