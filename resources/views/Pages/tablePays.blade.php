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
        
                    <form class="form-inline mt-2 ml-2 float-right mr-4 ml-2" action="{{URL::to('searchpays')}}" method="get" role="search">
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

@if(isset($Tpays))
        <div class='table-responsive mt-5'>
                <table class="table table-striped table-hover table-bordered">
                <!--Table head-->
                  <thead>
                      <tr align="center">
                          <th>Pays</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach($Tpays as $Tpay)
                      <tr align="center">
                          
                          <td>{{ $Tpay->nomPays }}</td>
                          
                          <td>
                            <div class="d-flex justify-content-center">
                                <div class="p-2">
                          <form action="{{url('pays/'.$Tpay->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-outline-danger waves-effect px-3 mt-auto" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </form>
                                </div>
                               <div class="p-2">
                        <a type="button" href="{{url('Tpays/'.$Tpay->id.'/modifierTable')}}" class="btn btn-outline-success waves-effect px-3 mt-auto"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
                               
                    </div> 
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
                        
                        {{$Tpays->links()}}
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

                @if(isset($pays))

                <div class='table-responsive mt-5'>
                        <table class="table table-striped table-hover table-bordered">
                        <!--Table head-->
                          <thead>
                              <tr align="center">
                                  <th>Pays</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                        <!--Table head-->
                          <!--Table body-->
                          <tbody>
                              @foreach($pays as $pay)
                              <tr align="center">
                                  
                                  <td>{{ $pay->nomPays }}</td>
                                  
                                  <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="p-2">
                                  <form action="{{url('pays/'.$pay->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-outline-danger waves-effect px-3 mt-auto" onclick="return confirm('Voulez vous supprimer ?')"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>
                                        </div>
                                       <div class="p-2">
                                <a type="button" href="{{url('Tpays/'.$pay->id.'/modifierTable')}}" class="btn btn-outline-success waves-effect px-3 mt-auto"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                       
                            </div> 
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
                                
                                {{$pays->links()}}
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
                
               

</div>


<div class="container">
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
