@extends('Master.layout')
@section('content')

<div class="container">
                
	<div class="mt-5">

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

       <!--Top Table UI-->
<div class="card p-2 mb-5">
    
    <!--Grid row-->
    <div class="row">
        <!--Grid column-->
        <div class="col-lg-11 col-md-6">

                <!-- Search form -->

            <form class="form-inline mt-2 ml-2 float-right mr-4 ml-2" action="{{URL::to('rechercheEntreprise')}}" method="post" role="search">
                    {{ csrf_field() }}
                <input class="form-control form-control-sm" type="text" name="q" placeholder="Recherche..." style="max-width: 150px;">
                <button type="submit" class="btn btn-sm btn-primary ml-2 px-1"><i class="fa fa-search"></i>  </button>
            </form>

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</div>
<!--Top Table UI-->

<!-- Nav tabs -->
<div class="row">
    <div class="col-md-3">
        <ul class="nav  md-pills pills-primary flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">Tous les entreprises
                <i class="fa fa-users" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item">
                    
                <a class="nav-link" href="{{url('createEntreprise')}}" role="tab">Créer une entreprise
                <i class="fa fa-file-text ml-2"></i>
                </a>
            </li>
            <li class="nav-item">
            <!--Panel-->
<div class="card border-primary mb-3" style="max-width: 18rem;">
    <div class="card-header">Filtrage</div>
    <div class="card-body text-primary">
        
        
        <form action="{{URL::to('filtre')}}" method="post" role="search">
            {{ csrf_field() }} 
        <!--Name-->
        <h5 class="card-title">Pays</h5>
      
        <select value="{{ old('pays')}}" name="pays" id="pays" class="browser-default form-control colorful-select dropdown-primary">
            <option disabled selected>Pays</option>
            @foreach($pay as $pays)
            <option value="{{ $pays->id }}">{{ $pays->nomPays }}</option>
            @endforeach
        </select>
        
                <br>
                
                <!--Blue select-->
                <h5 class="card-title">Ville</h5>
                        <select value="{{ old('ville')}}" name="ville" id="vil" class="browser-default form-control colorful-select dropdown-primary">
                            <option disabled selected>Ville</option>
                            <option value=""></option>
                            
                        </select>
                <!--/Blue select-->
                <br>
                <!--Grid column-->
                
                    <!--Blue select-->
                    <h5 class="card-title">Type d’organisme</h5>
                    <select name="orgid" id="orgid" class="browser-default form-control colorful-select dropdown-primary">
                        <option value="" disabled selected>Type d’organisme</option>
                        @foreach($type_orgs as $type_org)
                        <option value="{{$type_org->id}}">{{$type_org->type_org}}</option>
                        @endforeach
                    </select>
                   
                    <br>
                    <!--/Blue select-->
                <button type="submit" class="btn btn-primary">filtre</button>
            </form>
           
            
       
    </div>
</div>
<!-- Panel -->
</li>             
        </ul>
    </div>
    <div class="col-md-9">
    
    
        <!-- Tab panels -->
        <div class="tab-content vertical">
        <!--Panel 1-->
        
        <div class="tab-pane fade in show active" id="panel21" role="tabpanel">

                   <div class="row">
                       @foreach($entrep as $entreps)     
                            @if($entreps->etat == 1)
                                <div class="col-lg-4 mt-5">
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
                    @endif
                   @endforeach         
</div>

        </div>
        <!--/.Panel 1-->
        
        </div>
   
</div>


</div>
<!-- Nav tabs -->

<!--Pagination -->

<nav aria-label="pagination example" class="mt-5 float-right">
    <ul class="pagination pagination-circle pg-blue mb-0">

        <!--First-->
        <li class="page-item disabled"><a class="page-link">Précédent</a></li>

        <!--Arrow left-->
        <li class="page-item disabled">
            <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <!--Numbers-->
        
        {{$entrep->links()}}
        <!--Arrow right-->
        <li class="page-item">
            <a class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>

        <!--Last-->
        <li class="page-item"><a class="page-link">Suivant</a></li>

    </ul>
</nav> 
</div>      
        

</div>  
   


@endsection