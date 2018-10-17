@extends('Master.layout')
@section('content')

<div class="container mt-5">
        
            <div class="row mt-5">
                <div class="col-md-2" style="position: relative;margin: auto">
                <img class="card-img-top figure-img img-fluid" src="/storage/cover_images/{{$detail->logo}}" alt="Card image cap" >
                <figcaption class="figure-caption text-right">{{$detail->raisonSociale}}</figcaption>
            </div>
            </div>
            <div class="row mt-3 text-center">
                    <div class="col-lg-12"><p style="font-size: 30px;font-weight: bold">Les informatins d'entreprise : </p></div>
                </div>
            <div class="row mt-5 text-left">
                <div class="col ml-5">
                    <strong class="font-weight-bold">Raison Sociale : </strong> {{$detail->raisonSociale}} <br><br>
                    <strong class="font-weight-bold">Site Web : </strong> {{$detail->siteWeb}}<br><br>
                    <strong class="font-weight-bold">Capital : </strong> {{$detail->capital}}<br><br>
                    <strong class="font-weight-bold">Adresse : </strong> {{$detail->adresse}}<br><br>
                    <strong class="font-weight-bold">Description : </strong> {{$detail->discription}}<br><br>
                    <strong class="font-weight-bold">Secteur : </strong> {{$detail->secteur}}<br><br>
                    <strong class="font-weight-bold">Sous secteur : </strong> {{$detail->Ssecteur}}<br><br>
                </div>
                <div class="col ml-5">
                        <strong class="font-weight-bold">Pays : </strong> {{$detail->nomPays}}<br><br>
                        <strong class="font-weight-bold">Ville : </strong> {{$detail->nomVille}}<br><br>                    
                        <strong class="font-weight-bold">Telephone : </strong> {{$detail->tel}}<br><br>
                        <strong class="font-weight-bold">Email : </strong> {{$detail->email}}<br><br>
                        <strong class="font-weight-bold">Fax : </strong> {{$detail->fax}}<br><br>
                        <strong class="font-weight-bold">Type organisme : </strong> {{$detail->type_org}}<br><br>
                        
                </div>
            </div>
            <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
            <div class="row mt-5 text-left">
                    <div class="col ml-5">
                            <!--Avatar-->
                            <div class="avatar mx-auto white"><img src="/uploads/avatars/{{ $detail->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                                <figcaption class="figure-caption text-right">{{$detail->nom}}</figcaption>
                            </div>
                    </div>
                <div class="col ml-5">
                        <strong class="font-weight-bold">Nom : </strong> {{$detail->nom}}<br><br>
                        <strong class="font-weight-bold">Prenom : </strong> {{$detail->prenom}}<br><br>
                        <strong class="font-weight-bold">Etat Civil : </strong> {{$detail->civ}}<br><br>
                        <strong class="font-weight-bold">Telephone : </strong> {{$detail->Tel}}<br><br>
                        <strong class="font-weight-bold">Email : </strong> {{$detail->Email}}<br><br>
                        <strong class="font-weight-bold">Poste : </strong> {{$detail->poste}}<br><br>
                    </div>
            </div>
             @if(!Auth::guest())
            @if(Auth::user()->id == $detail->user_id)
            <div class="row text-center mt-5">
                    <div class="col-lg-12">
                            <form action="{{url('details/'.$detail->entrepriseId)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}} 
                                <button type="submit" class="btn btn-danger btn-rounded" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                        
                        <a type="button" href="{{url('details/'.$detail->entrepriseId.'/modifierEntreprise')}}" class="btn btn-primary btn-rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </div>
            </div>
            @endif
            @endif


    
                                     
                        
                </div>

                @include('Pages.footer');
@endsection