</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>B2B Africa</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/1.png" alt="">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

    <!-- Start your project here-->
    
    <!--Main Navigation-->
<header>

    <nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-1">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/1.png')}}" alt="" width="50" height="40"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect waves-light" href="{{url('/')}}">Accueil
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="{{url('annuaire')}}">Annuaire</a>
                        </li>
                        @if(!Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="{{ route('conversations') }}">Messenger</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" href="{{ url('index') }}">Publication</a>
                            </li>
                            @if(Auth::user()->nom == 'admin')
                            <li class="nav-item dropdown">
                                    <div class="btn-group">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adminstration</a>

    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ url('Apublication') }}">Tous les publications</a>
        <a class="dropdown-item" href="{{ url('tousEntreprises') }}">Tous les entreprises</a>
        <a class="dropdown-item" href="{{ url('user') }}">Tous les users</a>
        <a class="dropdown-item" href="{{ url('remplirtable') }}">Remplir tables</a>

        <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown" href="#">Tables</a>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('pays') }}">Pays</a>
                <a class="dropdown-item" href="{{ url('villes') }}">Villes</a>
                <a class="dropdown-item" href="{{ url('typeOrg') }}">type organismes</a>
                <a class="dropdown-item" href="{{ url('secteur') }}">Secteurs</a>
                <a class="dropdown-item" href="{{ url('Ssecteur') }}">Sous secteurs</a>
        
            </div>
        </div>

    </div>
</div>

                            </li>
                            
                        {{--<li class="nav-item dropdown">
                            <div class="btn-group">

    

                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adminstration
                            </a>
                            <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('Apublication') }}">Tous les publications</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('tousEntreprises') }}">Tous les entreprises</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('user') }}">Tous les users</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('remplirtable') }}">Remplir tables</a>
                                <hr>
                                
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('pays') }}">Tables pays</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('villes') }}">Tables villes</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('typeOrg') }}">Tables type organismes</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('secteur') }}">Tables Secteurs</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{ url('Ssecteur') }}">Tables Sous secteurs</a>
                                    
                            </div>
                        </li>--}}
                        @endif
                        @endif
                    </ul>
                
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                                        

                        <!-- notification -->
                    {{--    @if(Auth::check())
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge default-color-dark">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        <i class="fa fa-envelope"></i>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                    @if(auth()->user()->unreadNotifications->count())
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                    <a class="dropdown-item waves-effect waves-light" href="#">
                                        {{ $notification->data['message']['content'] }}
                                    </a>
                                    @endforeach
                                    @else
                                    <a class="dropdown-item waves-effect waves-light" href="#">
                                        Non notifications
                                    </a>
                                    @endif
                                </div>
                            </li>
                       @endif--}}


                        <li class="nav-item avatar dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 @if(!Auth::user())
                                <img src="/uploads/avatars/default.jpg" class="rounded-circle z-depth-0" alt="avatar image">
                                @else
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="rounded-circle z-depth-0" alt="avatar image">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                <!--<a class="dropdown-item waves-effect waves-light" href="{{url('/')}}">Connecter</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{url('reg')}}">Registre</a>-->

                                 <!-- Authentication Links -->
                        @guest
                            <a class="nav-link dropdown-item waves-effect waves-light"  href="{{ url('/') }}">{{ __('Connecter') }}</a>
                            <a class="nav-link dropdown-item waves-effect waves-light" href="{{ url('registre') }}">{{ __('Registre') }}</a>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnect') }}
                                    </a>
                                   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="nav-link dropdown-item waves-effect waves-light" href="{{ url('compte/'.Auth::user()->id) }}">Profil</a>
                                </div>
                            </li>
                        @endguest
                                
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
</header>
<!--Main Navigation-->

@yield('content')

    <!-- /Start your project here-->
    
     <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <!-- Your custom script (optional) -->
    <script>
    
// Material Select Initialization
$(document).ready(function() {
   $('.mdb-select').material_select();
 });
    
    </script>
    
    <script>
            $('#pays').on('change',function(e){
                console.log(e);
                var pays_id = e.target.value;
                //ajax
                $('#vil').empty();
                $.get('/ajax-ville?pays_id=' + pays_id,function(data){
                    //succes data
                    $.each(data, function(createEntreprise, ville){
                        $('#vil').append('<option value="'+ville.id+'">'+ville.nomVille+'</option>');
                    });
                });
            });
    
    </script>

{{-- script de secteur --}}
    <script>
            $('#secteur').on('change',function(e){
                console.log(e);
                var secteur_id = e.target.value;
                //ajax
                $('#Ssecteurs').empty();
                $.get('/ajax-secteur?secteur_id=' + secteur_id,function(data){
                    //succes data
                    $.each(data, function(createEntreprise, Sous_secteur){
                        $('#Ssecteurs').append('<option value="'+Sous_secteur.id+'">'+Sous_secteur.Ssecteur+'</option>');
                    });
                });
            });
    
    </script>

      <!-- modifier publication -->

      <script>
            $('#centralModalSuccess1').on('show.bs.modal', function (event) {
      
            var button = $(event.relatedTarget); 
            var titre = button.data('titre'); 
            var body = button.data('body') ;
            var id = button.data('id') ;
            var modal = $(this);
      
            modal.find('.modal-body #titre').val(titre);
            modal.find('.modal-body #body').val(body);
            modal.find('.modal-body #id').val(id);
      });
          </script>

    <script src="{{ asset('/js/like.js') }}"></script>

    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
    </script>

                    {{-- js de model --}}
    <script>
            $("#ModalWarning").on('hidden.bs.modal', function(){
                alert("Hello World!");
            });
    </script>

    <!-- modifier publication Adminstration -->

    <script>
          $('#centralModalSuccess2').on('show.bs.modal', function (event) {
    
          var button = $(event.relatedTarget); 
          var titre = button.data('titre'); 
          var body = button.data('body') ;
          var id = button.data('id') ;
          var modal = $(this);
    
          modal.find('.modal-body #titre').val(titre);
          modal.find('.modal-body #body').val(body);
          modal.find('.modal-body #id').val(id);
    });
        </script>

        <script>
            $('.dropdown-submenu .dropdown-toggle').on("click", function(e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).next('.dropdown-menu').toggle();
            });
        </script>


</body>

</html>

