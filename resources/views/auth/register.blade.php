<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="xyiBo1teyHSSetQs0ZEMM3aCcYz5YtlRBSJ4vbGZ">

    <title>mabwe admin | enregistrement</title>
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">


    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/components.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout 1-column navbar-sticky bg-full-screen-image footer-static blank-page
   light-layout "
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- register section starts -->
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- register section left -->
                                <div class="col-md-6 col-12 px-0">
                                    <div
                                        class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-2">Sign Up</h4>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p> <small> Entrez vos informations pour avoir accès au logiciel</small>
                                            </p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form method="POST" action="{{ route("register") }}">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 mb-50">
                                                            <label for="inputfirstname4">Nom</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="inputfirstname4"
                                                                value="{{ old('name') }}" placeholder="Nom" />
                                                            @error('name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 mb-50">
                                                            <label for="inputfirstname4">Email</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" id="inputfirstname4"
                                                                value="{{ old('email') }}" placeholder="Email" />
                                                            @error('email')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="password">Mot de
                                                            passe</label>
                                                        <input type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" id="password" value="{{ old('password') }}"
                                                            placeholder="Mot de passe" />
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-2">
                                                        <label class="text-bold-600" for="conf-pasword">Confirmer mot
                                                            de passe</label>
                                                        <input type="password"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" id="conf-password"
                                                            value="{{ old('conf_password') }}"
                                                            placeholder="Mot de passe" />
                                                        @error('password_confirmation')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary glow position-relative w-100">S'enregistrer<i
                                                            id="icon-arrow"
                                                            class="bx bx-right-arrow-alt"></i></button>
                                                </form>
                                                <hr>
                                                <div class="text-center"><small class="mr-25">Vous avez un compte?</small>
                                                    <a href="{{ route("login") }}"><small>Connexion</small> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- image section right -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                    <img class="img-fluid" src="/backend/images/pages/register.png"
                                        alt="branding logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- register section endss -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Vendor JS-->
    <script>
        var assetBaseUrl = "index.html";
    </script>
    <script src="/backend/vendors/js/vendors.min.js"></script>
    <script src="/backend/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/backend/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/backend/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/backend/js/scripts/configs/horizontal-menu.js"></script>
    <script src="/backend/js/core/app-menu.js"></script>
    <script src="/backend/js/core/app.js"></script>
    <script src="/backend/js/scripts/components.js"></script>
    <script src="/backend/js/scripts/footer.js"></script>
    <script src="/backend/js/scripts/customizer.js"></script>
    <!-- END: Theme JS-->

</body>
<!-- END: Body-->

</html>
