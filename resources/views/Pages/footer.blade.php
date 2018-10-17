
<!--Footer-->
<footer class="page-footer font-small unique-color-dark pt-0">

    <div style="" class="bg-primary">
        <div class="container">
            <!--Grid row-->
            <div class="row py-4 d-flex align-items-center">

            </div>
            <!--Grid row-->
        </div>
    </div>

    <!--Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row mt-3">

            <!--First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>objectif</strong>
                </h6>
                <hr class="primary-color-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Première plateforme de réseautage destinée aux entreprises africaines. Notre mission est de mettre en valeur les potentiels du continent et promouvoir le commerce interAfricain. B2B Africa met au service des acteurs économiques de l’Afrique, Privés et publiques, un espace de collaboration et de partage.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
        {{--<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Products</strong>
                </h6>
                <hr class="primary-color-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">MDBootstrap</a>
                </p>
                <p>
                    <a href="#!">MDWordPress</a>
                </p>
                <p>
                    <a href="#!">BrandFlow</a>
                </p>
                <p>
                    <a href="#!">Bootstrap Angular</a>
                </p>
            </div>--}}
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>LIENS UTILES</strong>
                </h6>
                <hr class="primary-color-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                        <a href="{{url('/')}}">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                </p>
                <p>
                        <a href="{{url('annuaire')}}">Annuaire</a>
                </p>
                @if(!Auth::guest())
                <p>
                   <a href="{{ route('conversations') }}">Messenger</a>
                </p>
                <p>
                    <a href="{{ url('index') }}">Publication</a>
                </p>
                @endif
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Contact</strong>
                </h6>
                <hr class="primary-color-dark accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fa fa-home mr-3"></i> 203 Bd Yacoub El Mansour 3ème Étage Appt. N° 5. - Casablanca</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> contact@neartech.ma</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> 06-00-02-16-73</p>
                <p>
                    <i class="fa fa-print mr-3"></i> 05-22-94-76-05</p>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a href="{{url('/')}}">
            <strong>b2b.neartech.ma</strong>
        </a>
    </div>
    <!--/.Copyright -->

</footer>
<!--/.Footer-->
                      