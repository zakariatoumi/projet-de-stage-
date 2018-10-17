@extends('Master.layout')
@section('content')

<div class="container mt-5">
      
    <div class="row mt-5">
        <div class="col-md-2" style="position: relative;margin: auto">
        <img class="card-img-top figure-img img-fluid" src="/uploads/avatars/{{$eyes->avatar}}" alt="Card image cap" >
        <figcaption class="figure-caption text-right">{{$eyes->nom}}</figcaption>
    </div>
    </div>
    <div class="row mt-3 text-center">
            <div class="col-lg-12"><p style="font-size: 30px;font-weight: bold">Détails de publication : </p></div>
        </div>
    <div class="row mt-5 text-left">
        <div class="col ml-5">
            <strong class="font-weight-bold">Nom : </strong> {{$eyes->nom}} <br><br>
            <strong class="font-weight-bold">Prenom : </strong> {{$eyes->prenom}}<br><br>
            <strong class="font-weight-bold">Etat Civil : </strong> {{$eyes->civ}}<br><br>
            <strong class="font-weight-bold">Telephone : </strong> {{$eyes->Tel}}<br><br>
            <strong class="font-weight-bold">Email : </strong> {{$eyes->Email}}<br><br>
            <strong class="font-weight-bold">Poste : </strong> {{$eyes->poste}}<br><br>
        </div>
        <div class="col ml-5">
            <strong class="font-weight-bold">Titre : </strong> {{$eyes->titre}}<br><br>
            <strong class="font-weight-bold">Body : </strong> {{$eyes->body}}<br><br>
                
        </div>
    </div>
    {{--@if(!Auth::guest())
    @if(Auth::user()->nom == 'admin')
    <div class="row text-center mt-5">
            <div class="col-lg-12">
    <form action="{{url('publication/'.$eyes->id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE')}}
        <button type="submit" class="btn btn-outline-danger waves-effect px-3" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
        </form>
            </div>
    </div>
    @endif
    @endif--}}
    
</div>

@include('Pages.footer')
@endsection
