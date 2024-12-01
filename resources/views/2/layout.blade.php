@php
use App\Models\User;
use Carbon\Carbon; 

//dd($perms_ids);

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{--
    <link rel="icon" href="{{ asset('favicon.ico') }}"> --}}

    <title>{{ $page }}</title>

    @livewireStyles

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <!-- Scripts --> 
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> 
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <!-- Or for RTL support -->
    <style>
        .dataTables_filter,
        .dataTables_length {
            margin-top: 10px;
            margin-bottom: 10px;
            float: left;
        }

        /* Square button */
        .square {
            border-radius: 0 !important;
        }

        .bg-cp {
            background-color: #282733 !important;
        }

        .modal-content {
            background-color: #f1f2f5 !important; 
        }

    </style>

</head>

<body {{-- oncontextmenu='return false' --}} class='snippet-body'>

    <body class="body-pd" id="body-pd">

        <!-- Page Heading -->
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>
            <div class="titre d-flex justify-content-center align-content-center   me-auto ms-2  ">
                {{-- <img src="{{ asset('images/fadLogo3.png') }}" class="fw-bold ms-2 " alt="Accueil" height="36"
                    title="Accueil"> --}} <h3 class="fw-bold ms-2 ">MOBIGO</h3>
            </div>
            <div class="navbar-nav float-end ">
                <h5 class="fw-bold text-primary">{{ session('nom') }} </h5>
            </div>
        </header>
        <!-- Page Sidebar -->

        <div class="l-navbar" id="nav-bar">
            <nav class="nav nav_">
                <div class="nav_list">
                    <a href="{{ url('/') }}" class="nav_link mb-3 mt- @if($pageSlug == "index") activee @endif ">
                        <i class='fa-solid fa-hospital nav_icon ' data-bs-toggle=" tooltip"
                        data-bs-placement="right" title="Accueil"></i>
                        <span class="nav_name">Accueil</span>
                    </a> 

                    <a href="{{ url('/medical') }}" class="nav_link  @if($pageSlug == "medical") activee @endif ">
                        <i class='fa-solid fa-house-medical nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Médical"></i>
                        <span class="nav_name">Médical</span>
                    </a>
                    <a href="{{ url('/ecommerce') }}" class="nav_link  @if($pageSlug == "ecommerce") activee @endif ">
                        <i class='fa-solid fa-cart-shopping nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="E-commerce"></i>
                        <span class="nav_name">E-commerce</span>
                    </a>
                    <a href="{{ url('/social') }}" class="nav_link  @if($pageSlug == "social") activee @endif ">
                        <i class='fa-solid fa-user-group nav_icon' data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Social"></i>
                        <span class="nav_name">Social</span>
                    </a> 
                    <a href="{{ url('/transport') }}" class="nav_link  @if($pageSlug == "transport") activee @endif ">
                        <i class=' fa-solid fa-van-shuttle nav_icon' data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Transport"></i>
                        <span class="nav_name">Transport</span>
                    </a>  
                    <a href="{{ url('/factures') }}" class="nav_link  @if($pageSlug == "factures") activee @endif ">
                        <i class=' fa-solid fa-file-invoice-dollar nav_icon' data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Factures"></i>
                        <span class="nav_name">Factures</span>
                    </a>  
                    <a href="{{ url('/administratif') }}" class="nav_link   @if($pageSlug == "administratif") activee @endif ">
                        <i class='fas fa-cogs nav_icon fa-2x' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Administratif"></i>
                        <span class="nav_name">Administratif</span>
                    </a>

                </div>
                <div>
                    <a href="#" class="nav_link ">
                        <i class='fas fa-user  nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Profile"></i>
                        <span class="nav_name">Profile</span>
                    </a>

                    <a href="{{ url('logout') }}" class="nav_link">
                        <i class='fas fa-sign-out-alt  nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Déconnexion"></i>
                        <span class="nav_name">Déconnexion</span>
                    </a>
                </div>

            </nav>
        </div>

        <!-- Page Content -->
        <!--Container Main start-->

        <div class="main-c  p-3">
            @yield('content')
            <x-go-top />
        </div>

        @stack('modals')

        @stack('scripts')

        
        <script>
            var goTopHandler = function(e) {
                $('.go-top').on('click', function(e) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    e.preventDefault();
                });
            };

            document.addEventListener('DOMContentLoaded', () => {
                const button = document.querySelector('#button');
                const tooltip = document.querySelector('#tooltip');
                const arrow = document.querySelector('#arrow');

                // Create a Popper instance
                createPopper(button, tooltip, {
                    placement: 'top',
                    modifiers: [
                        {
                            name: 'arrow',
                            options: {
                                element: arrow,
                            },
                        },
                    ],
                });
            });


            window.addEventListener('close-modal', event => {
                $('.modal').modal('hide');
            });

            window.addEventListener('open-modal', event => {
                $('.modal').modal('show');
            });

            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            });

            
        </script>
 
        @livewireScripts 
        @yield('script')

    </body>

</html>