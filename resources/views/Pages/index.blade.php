@extends('Master.layout')
@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-sm-8">
            <div class="blog-post">
                    
            </div>
        </div>
    </div>



    <div class="row mt-5">
        <div class="col">
            <!-- 1 of 3 -->
        </div>
       
        <div class="col-lg-6">

            <!--Body-->
          <form action="{{ url('AjouterPublication') }}" method="post">
            {{csrf_field()}}      
    <!-- Grid row -->
    
    <div class="form-row">
        <!-- Default input -->
        <div class="form-group col-md-12">
            <label for="titre">Titre</label>
            <input type="text" name="titre" value="{{ old('titre')}}" class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" id="titre" placeholder="Titre">
            @if($errors->has('titre'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('titre')) }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-row">
        <!-- Default input -->
        <div class="form-group col-md-12">
            <label for="body">Publication</label>
            <textarea value="{{ old('body')}}" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="5" placeholder="Ecrire votre publication..."></textarea>
            @if($errors->has('body'))
                <div class="invalid-feedback">
                    {{ implode(',', $errors->get('body')) }}
                </div>
            @endif
        </div>
    </div>
              
    <!-- Grid row -->
    
          
          <div class="justify-content-center">
              
              <button type="submit" class="btn btn-primary">Ajouter</button>
             
          </div>
        </form>
         

            @foreach($publication as $publications)


     
                        <div class="post mt-5" data-postid="{{ $publications->id }}">
                        <span class="d-flex justify-content-between"><h3 style="font-weight: bold"> {{ $publications->titre }} </h3>
                            <a style="position: relative;left: 10%;font-weight: bold;font-size: 30px;color: black" data-toggle="collapse" href="#multiCollapseExample2{{ $publications->id }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">...</a>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample2{{ $publications->id }}">
                                        <div class="card card-body">
                                           @if(!Auth::guest())
                                            @if(Auth::user()->id == $publications->user_id)
                                                <form action="{{url('index/'.$publications->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}} 
                                                <button type="submit" class="btn btn-danger btn-sm btn-rounded card-link" onclick="return confirm('Voulez vous supprimer ?')">Supprimer</button>
                                                </form>                                                                                     
                                                <a type="button" class="btn btn-success btn-sm btn-rounded card-link" href="{{url('index/'.$publications->id.'/modifierTable')}}">Modifier</a>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                        
                        <div class="font-weight-bold">
                            <span class="avatar mx-auto white">
                                <img width="40" height="40" src="/uploads/avatars/{{ $publications->user->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                            </span>
                             {{ $publications->user->prenom }} {{ $publications->user->nom }}
                            </div>
                        <br>
                        <p>{{--<span style="font-weight: bold">Publication : </span>--}}{{ str_limit(strip_tags($publications->body), 100) }}
                            @if (strlen(strip_tags($publications->body)) > 100) <a class="" data-toggle="collapse" href="#multiCollapseExample1{{ $publications->id }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Lire la suite</a> @endif
                            
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1{{ $publications->id }}">
                                        <div class="card card-body">
                                            {{ $publications->body }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="figure-caption text-right"><h6>{{--<span style="font-weight: bold">Heure : </span>--}} {{ $publications->created_at }} </h6></figcaption>
                        </p>
                        <div class="interaction">
                        <a href="#" class="btn btn-xs btn-primary like">{{ Auth::user()->likes()->where('publications_id', $publications->id)->first() ? Auth::user()->likes()->where('publications_id', $publications->id)->first()->like == 1 ? 'Vous aimez ce publication' : 'j\'aime' : 'j\'aime'  }}</a>
                        <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('publications_id', $publications->id)->first() ? Auth::user()->likes()->where('publications_id', $publications->id)->first()->like == 0 ? 'Vous n\'aimez pas ce publication' : 'je n\'aime pas' : 'je n\'aime pas'  }}</a>
                                
                        
                            <hr>
                               
                            </div>
                        </div>
                    @endforeach
        </div>
        <div class="col">
                <!-- 1 of 3 -->

        </div>
    </div>

</div>





                @include('Pages.footer');
@endsection



