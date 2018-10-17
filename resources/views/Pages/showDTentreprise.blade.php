@extends('Master.layout')
@section('content')

<div class="container mt-5">
      
    <div class="row mt-5">
        
    </div>
    <div class="row mt-3 text-center">
            <div class="col-lg-12"><p style="font-size: 30px;font-weight: bold">Détails de entreprise : </p></div>
        </div>
    <div class="row mt-5 text-left">
           
        <div class="col ml-5">
                <div class="col-md-4">
                        <img class="card-img-top figure-img img-fluid" src="/uploads/avatars/{{$EntrepriseUser->avatar}}" alt="Card image cap" >
                        <figcaption class="figure-caption text-right">{{$EntrepriseUser->nom}}</figcaption>
                    </div>
                    <div class="mt-5">
            <strong class="font-weight-bold">Nom : </strong> {{$EntrepriseUser->nom}} <br><br>
            <strong class="font-weight-bold">Prenom : </strong> {{$EntrepriseUser->prenom}}<br><br>
            <strong class="font-weight-bold">Etat Civil : </strong> {{$EntrepriseUser->civ}}<br><br>
            <strong class="font-weight-bold">Telephone : </strong> {{$EntrepriseUser->Tel}}<br><br>
            <strong class="font-weight-bold">Email : </strong> {{$EntrepriseUser->Email}}<br><br>
            <strong class="font-weight-bold">Poste : </strong> {{$EntrepriseUser->poste}}<br><br>
        </div>
        </div>
        <div class="col ml-5">
                <div class="col-md-4">
                        <img class="card-img-top figure-img img-fluid" src="/storage/cover_images/{{$EntrepriseUser->logo}}" alt="Card image cap" >
                        <figcaption class="figure-caption text-right">{{$EntrepriseUser->raisonSociale}}</figcaption>
                </div>
                <div class="mt-5">
            <strong class="font-weight-bold">Raison Sociale : </strong> {{$EntrepriseUser->raisonSociale}}<br><br>
            <strong class="font-weight-bold">Capital : </strong> {{$EntrepriseUser->capital}}<br><br>
            <strong class="font-weight-bold">Description : </strong> {{$EntrepriseUser->discription}}<br><br>
            <strong class="font-weight-bold">Adresse : </strong> {{$EntrepriseUser->adresse}}<br><br>
            <strong class="font-weight-bold">Site Web : </strong> {{$EntrepriseUser->siteWeb}}<br><br>
            <strong class="font-weight-bold">Telephone : </strong> {{$EntrepriseUser->tel}}<br><br>
            <strong class="font-weight-bold">Email : </strong> {{$EntrepriseUser->email}}<br><br>
            <strong class="font-weight-bold">Fax : </strong> {{$EntrepriseUser->fax}}<br><br>
                </div>
                
        </div>
    </div>
   
    
</div>

@include('Pages.footer')
@endsection
