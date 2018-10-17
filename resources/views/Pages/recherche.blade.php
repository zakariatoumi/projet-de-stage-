        @extends('Master.layout')
@section('content')

<div class="container mt-5">
        
<!-- ou couper had code kamle dyale had blade recherche ou changih bi code li 3adak -->

@if(isset($entrep))
    <p class="font-weight-bold"> Les résultats de la recherche : <b> {{ $q }} </p>
<h2 class="font-weight-bold">Resultat de recherche :</h2>

        

                <div class="row">
                    @foreach($entrep as $entreps)     
                         
                             <div class="col-lg-3 mt-5">
                             <!-- Card Regular -->
                     <div class="card card-cascade">
                     
                       <!-- Card image -->
                       <div class="view overlay">
                         <img class="card-img-top" src="/storage/cover_images/{{$entreps->logo}}" alt="Card image cap" >
                         <a href="{{url('details/'.$entreps->entrepriseId)}}">
                           <div class="mask rgba-white-slight"></div>
                         </a>
                       </div>
                     
                       <!-- Card content -->
                       <div class="card-body text-center">
                     
                         <!-- Title -->
                         <h4 class="card-title"><strong>{{$entreps->raisonSociale}}</strong></h4>
                         <!-- Subtitle -->
                         <h6 class="font-weight-bold indigo-text py-2">{{$entreps->siteWeb}}</h6>
                         <!-- Text -->
                         <p class="card-text">{{ str_limit(strip_tags($entreps->discription), 50) }}</p>
                     
                          <!-- voir details + -->
                         <a type="button" href="{{url('details/'.$entreps->entrepriseId)}}" class="btn-floating btn-small btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     
                       </div>
                     
                     </div>
                     <!-- Card Regular -->
                 </div>
                 
                @endforeach         
</div>
     
           

     
@endif

 @if(isset($erro))

  <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{$erro}} <strong>{{ $q }}</strong>
      </div>
   
@endif
                </div>

                @include('Pages.footer');
@endsection
