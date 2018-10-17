@extends('Master.layout')
@section('content')

<div class="container mt-5">
    
        <!--Top Table UI-->
        <div class="card p-2 mb-5">
            
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-11 col-md-6">
        
                        <!-- Search form -->
        
                    <form class="form-inline mt-2 ml-2 float-right mr-4 ml-2" action="{{URL::to('searchentreprise')}}" method="get" role="search">
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


        @if(isset($Tentre))


        <div class='table-responsive'>
                <table class="table table-striped table-hover table-bordered">
                <!--Table head-->
                  <thead>
                      <tr align="center">
                          <th>Logo</th>
                          <th>Raison Sociale</th>
                          <th>Capital</th>
                          <th>Description</th>
                          <th>Adresse</th>
                          <th>SiteWeb</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Fax</th>
                          <th>Etat</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach($Tentre as $Tentres)
                      <tr align="center">
                          <td><div class="avatar mx-auto white"><img src="/storage/cover_images/{{ $Tentres->logo }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          </div></td>
                          <td>{{ $Tentres->raisonSociale }}</td>
                          <td>{{ $Tentres->capital }}</td>
                          <td>{{ $Tentres->discription }}</td>
                          <td>{{ $Tentres->adresse }}</td>
                          <td>{{ $Tentres->siteWeb }}</td>
                          <td>{{ $Tentres->tel }}</td>
                          <td>{{ $Tentres->email }}</td>
                          <td>{{ $Tentres->fax }}</td>
                          <td>{{ $Tentres->etat }}</td>
                          <td>
                                <!-- Switch -->
                                <div class="switch">
                                    @if($Tentres->etat == 1)
                                    <form action="{{ url('tousEntreprises/'.$Tentres->entrepriseId.'/publier')}}" method="post" id="valideform{{$Tentres->entrepriseId}}">
                                     <input type="hidden" name="_method" value="PUT">
                                     {{ csrf_field() }}
                                     <label for="exampleSwitch{{$Tentres->entrepriseId}}" onclick="event.preventDefault();document.getElementById('valideform{{$Tentres->entrepriseId}}').submit();">
                                       
                                     <input type="checkbox" class="form-control" name="exampleSwitch{{$Tentres->entrepriseId}}" checked>
                                        <span class="lever"></span>
                                        
                                     </label>
                                </form>
                                @else
                                <form action="{{ url('tousEntreprises/'.$Tentres->entrepriseId.'/publier')}}" method="post" id="valideform{{$Tentres->entrepriseId}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <label for="exampleSwitch{{$Tentres->entrepriseId}}" onclick="event.preventDefault();document.getElementById('valideform{{$Tentres->entrepriseId}}').submit();">
                                        
                                      <input type="checkbox" name="exampleSwitch{{$Tentres->entrepriseId}}" class="form-control">
                                      <span class="lever"></span>
                                        
                                      </label>
                                    </form>
                                    @endif
                                  </div> 

                                  <form action="{{url('tousEntreprises/'.$Tentres->entrepriseId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger waves-effect px-3" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>

                                    <a type="button" href="{{url('showEntreprises/'.$Tentres->entrepriseId)}}" class="btn btn-outline-primary waves-effect px-3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <!--Table body-->
                </table>
                <!--Table-->
                </div>


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
                        
                        {{$Tentre->links()}}
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
                @endif

        @if(isset($Entreprise))
        <div class='table-responsive'>
                <table class="table table-striped table-hover table-bordered">
                <!--Table head-->
                  <thead>
                      <tr align="center">
                          <th>Logo</th>
                          <th>Raison Sociale</th>
                          <th>Capital</th>
                          <th>Description</th>
                          <th>Adresse</th>
                          <th>SiteWeb</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Fax</th>
                          <th>Etat</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach($Entreprise as $Entreprises)
                      <tr align="center">
                          <td><div class="avatar mx-auto white"><img src="/storage/cover_images/{{ $Entreprises->logo }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          </div></td>
                          <td>{{ $Entreprises->raisonSociale }}</td>
                          <td>{{ $Entreprises->capital }}</td>
                          <td>{{ $Entreprises->discription }}</td>
                          <td>{{ $Entreprises->adresse }}</td>
                          <td>{{ $Entreprises->siteWeb }}</td>
                          <td>{{ $Entreprises->tel }}</td>
                          <td>{{ $Entreprises->email }}</td>
                          <td>{{ $Entreprises->fax }}</td>
                          <td>{{ $Entreprises->etat }}</td>
                          <td>
                                <!-- Switch -->
                                <div class="switch">
                                    @if($Entreprises->etat == 1)
                                    <form action="{{ url('tousEntreprises/'.$Entreprises->entrepriseId.'/publier')}}" method="post" id="valideform{{$Entreprises->entrepriseId}}">
                                     <input type="hidden" name="_method" value="PUT">
                                     {{ csrf_field() }}
                                     <label for="exampleSwitch{{$Entreprises->entrepriseId}}" onclick="event.preventDefault();document.getElementById('valideform{{$Entreprises->entrepriseId}}').submit();">
                                       
                                     <input type="checkbox" class="form-control" name="exampleSwitch{{$Entreprises->entrepriseId}}" checked>
                                        <span class="lever"></span>
                                        
                                     </label>
                                </form>
                                @else
                                <form action="{{ url('tousEntreprises/'.$Entreprises->entrepriseId.'/publier')}}" method="post" id="valideform{{$Entreprises->entrepriseId}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <label for="exampleSwitch{{$Entreprises->entrepriseId}}" onclick="event.preventDefault();document.getElementById('valideform{{$Entreprises->entrepriseId}}').submit();">
                                        
                                      <input type="checkbox" name="exampleSwitch{{$Entreprises->entrepriseId}}" class="form-control">
                                      <span class="lever"></span>
                                        
                                      </label>
                                    </form>
                                    @endif
                                  </div> 

                                  <form action="{{url('tousEntreprises/'.$Entreprises->entrepriseId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger waves-effect px-3" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>

                                    <a type="button" href="{{url('showEntreprises/'.$Entreprises->entrepriseId)}}" class="btn btn-outline-primary waves-effect px-3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <!--Table body-->
                </table>
                <!--Table-->
                </div>


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
                        
                        {{$Entreprise->links()}}
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

@include('Pages.footer')
@endsection
