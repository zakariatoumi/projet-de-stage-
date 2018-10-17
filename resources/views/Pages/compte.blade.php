@extends('Master.layout')
@section('content')

<div class="container mt-5">
        <div class="row">
                <div class="col">
                        <!--Section: Testimonials v.1-->
                        <section class="section pb-3 text-center">

                                    <!--Card-->
                                    <div class="card testimonial-card">
                        
                                        <!--Background color-->
                                        <div class="card-up primary-color lighten-2">
                                        </div>
                        
                                        <!--Avatar-->
                                        <div class="avatar mx-auto white"><img src="/uploads/avatars/{{ $userEd->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                                        </div>

                                        <form enctype="multipart/form-data" action="/profile" method="POST">
                                            <input type="file" name="avatar">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="pull-right btn btn-sm btn-primary" value="Ajouter Photo">
                                        </form>
                        
                                        <div class="card-body">
                                            <!--Name-->
                                            <h4 class="card-title mt-1">{{$userEd->nom}} {{$userEd->prenom}}</h4>
                                            <hr>
                                            <!--Quotation-->
                                            
                                                    @if(!Auth::guest())
                                                    @if(Auth::user()->id == $userEd->id)
                                                    <a type="button" class="btn btn-primary btn-rounded" href="{{url('compte/'.$userEd->id.'/modifier')}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <form action="{{url('compte/'.$userEd->id)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE')}} 
                                                        <button type="submit" class="btn btn-danger btn-rounded" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </form>
                                                    @endif
                                                    @endif
                                           
                                        </div>
                        
                                    </div>
                                    <!--Card-->
                        </section>
                                
                                <!--Grid column-->
                        
                                
                </div>
                <div class="col ml-lg-5 mt-lg-5">
                        <strong class="font-weight-bold">Nom : </strong> {{$userEd->nom}}<br><br>
                        <strong class="font-weight-bold">Prenom : </strong> {{$userEd->prenom}}<br><br>
                        <strong class="font-weight-bold">Etat Civil : </strong> {{$userEd->civ}}<br><br>
                        <strong class="font-weight-bold">Telephone : </strong> {{$userEd->Tel}}<br><br>
                        <strong class="font-weight-bold">Email : </strong> {{$userEd->Email}}<br><br>
                        <strong class="font-weight-bold">Poste : </strong> {{$userEd->poste}}<br><br>
                </div>
            </div>
                                         
                        
</div>



 @include('Pages.footer');
@endsection