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
        
                    <form class="form-inline mt-2 ml-2 float-right mr-4 ml-2" action="{{URL::to('searchUser')}}" method="get" role="search">
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


        @if(isset($Tuser))
        <div class='table-responsive'>
                <table class="table table-striped table-hover table-bordered">
                <!--Table head-->
                  <thead>
                      <tr align="center">
                          <th>Photo</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Etat Civil</th>
                          <th>Telephone</th>
                          <th>Poste</th>
                          <th>Etat</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach($Tuser as $Tusers)
                      <tr align="center">
                          <td><div class="avatar mx-auto white" style="width:50;height:50"><img src="/uploads/avatars/{{ $Tusers->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          </div></td>
                          <td>{{ $Tusers->nom }}</td>
                          <td>{{ $Tusers->prenom }}</td>
                          <td>{{ $Tusers->civ }}</td>
                          <td>{{ $Tusers->Tel }}</td>
                          <td>{{ $Tusers->poste }}</td>
                          <td>{{ $Tusers->etat }}</td>
                          <td>{{ $Tusers->Email }}</td>
                          <td>
                                <!-- Switch -->
                                <div class="switch">
                                    @if($Tusers->etat == 1)
                                    <form action="{{ url('tousUser/'.$Tusers->id.'/activer')}}" method="post" id="valideform{{$Tusers->id}}">
                                     <input type="hidden" name="_method" value="PUT">
                                     {{ csrf_field() }}
                                     <label for="exampleSwitch{{$Tusers->id}}" onclick="event.preventDefault();document.getElementById('valideform{{$Tusers->id}}').submit();">
                                        Off
                                     <input type="checkbox" class="form-control" name="exampleSwitch{{$Tusers->id}}" checked>
                                        <span class="lever"></span>
                                        On
                                     </label>
                                </form>
                                @else
                                <form action="{{ url('tousUser/'.$Tusers->id.'/activer')}}" method="post" id="valideform{{$Tusers->id}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <label for="exampleSwitch{{$Tusers->id}}" onclick="event.preventDefault();document.getElementById('valideform{{$Tusers->id}}').submit();">
                                        Off
                                      <input type="checkbox" name="exampleSwitch{{$Tusers->id}}" class="form-control">
                                      <span class="lever"></span>
                                        On
                                      </label>
                                    </form>
                                    @endif
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
                            
                            {{$Tuser->links()}}
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
@if(isset($user))

        <div class='table-responsive'>
                <table class="table table-striped table-hover table-bordered">
                <!--Table head-->
                  <thead>
                      <tr align="center">
                          <th>Photo</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Etat Civil</th>
                          <th>Telephone</th>
                          <th>Poste</th>
                          <th>Etat</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                <!--Table head-->
                  <!--Table body-->
                  <tbody>
                      @foreach($user as $users)
                      <tr align="center">
                          <td><div class="avatar mx-auto white" style="width:50;height:50"><img src="/uploads/avatars/{{ $users->avatar }}" alt="avatar mx-auto white" class="rounded-circle img-fluid">
                          </div></td>
                          <td>{{ $users->nom }}</td>
                          <td>{{ $users->prenom }}</td>
                          <td>{{ $users->civ }}</td>
                          <td>{{ $users->Tel }}</td>
                          <td>{{ $users->poste }}</td>
                          <td>{{ $users->etat }}</td>
                          <td>{{ $users->Email }}</td>
                          <td>
                                <!-- Switch -->
                                <div class="switch">
                                    @if($users->etat == 1)
                                    <form action="{{ url('tousUser/'.$users->id.'/activer')}}" method="post" id="valideform{{$users->id}}">
                                     <input type="hidden" name="_method" value="PUT">
                                     {{ csrf_field() }}
                                     <label for="exampleSwitch{{$users->id}}" onclick="event.preventDefault();document.getElementById('valideform{{$users->id}}').submit();">
                                        Off
                                     <input type="checkbox" class="form-control" name="exampleSwitch{{$users->id}}" checked>
                                        <span class="lever"></span>
                                        On
                                     </label>
                                </form>
                                @else
                                <form action="{{ url('tousUser/'.$users->id.'/activer')}}" method="post" id="valideform{{$users->id}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <label for="exampleSwitch{{$users->id}}" onclick="event.preventDefault();document.getElementById('valideform{{$users->id}}').submit();">
                                        Off
                                      <input type="checkbox" name="exampleSwitch{{$users->id}}" class="form-control">
                                      <span class="lever"></span>
                                        On
                                      </label>
                                    </form>
                                    @endif
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
                        
                        {{$user->links()}}
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
