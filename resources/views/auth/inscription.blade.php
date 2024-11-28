<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>INSCRIPTION | MOBIGO</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/main.css') }}">
    <!-- Scripts --> 
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/main.js') }}"></script>
    <script src="{{ asset('lib/locales-all.js') }}"></script>
    

    <style>
        html,
        body { 
            background-image: url('../images/bg_ssa.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        } 
    </style>

</head>

<body>

    <div class="container  my-5">
        <div class="row justify-content-center ">
            <div class="col-md-12 col-lg-12">
                <div class="card ">

                    <form action="/register" method="post">
                        @csrf

                        <div class="card-header bg-dark text-white d-flex ">
                            <div class=" text-center">
                                <h3 class="fw-bold">INSCRIPTION</h3>
                            </div>
                        </div>

                        

                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center">
                                {{ $message }}
                            </div>
                        @endif
                        @if ($message = Session::get('fail'))
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                        @endif
                            <div class="row ">

                                <div class="mt-3 col-6">
                                    <label for="nom" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fas fa-user icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nom" name="nom"
                                            placeholder="Nom du patient " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('nom')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-3 col-3 ">
                                    <label for="cni" class="form-label text-muted fw-italic mb-0">CNI
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-minus icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="cni" name="cni"
                                            placeholder="Numéro du CNI" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('cni')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                

                                <div class="mt-3 col-3 ">
                                    <label for="ssn" class="form-label text-muted fw-italic mb-0">SSN
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-minus icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="ssn" name="ssn"
                                            placeholder="Numero de sécurité social" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('ssn')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-3 col-6 ">
                                    <label for="sexe" class="form-label text-muted fw-italic mb-0">Sexe *</label>
                                    <div class="input-group mb-3 ">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fas fa-venus-mars icnbgc"></i>
                                        </span>
                                        <select name="sexe" class="form-select" id="sexe">
                                            <option value="" selected>Select</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('sexe')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div> 

                                <div class="mt-3 col-6 ">
                                    <label for="date_naissance" class="form-label text-muted fw-italic mb-0">Date de
                                        naissance
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-calendar-days icnbgc"></i>
                                        </span>
                                        <input type="date" class="form-control " id="date_naissance"
                                            name="date_naissance" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('date_naissance')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-3 col-6 ">
                                    <label for="lieu_naissance" class="form-label text-muted fw-italic mb-0">Lieu de
                                        naissance *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-city icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="lieu_naissance"
                                            name="lieu_naissance"
                                            placeholder="Lieu de naissance " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('lieu_naissance')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-3 col-6 ">
                                    <label for="telephone" class="form-label text-muted fw-italic mb-0">Telephone
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-phone icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="telephone"
                                            name="telephone" placeholder="ex: 77123456 " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('telephone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                

                                <div class="mt-3 col-6 ">
                                    <label for="email" class="form-label text-muted fw-italic mb-0">Email </label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-city icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="email"
                                            name="email"
                                            placeholder="Email" >
                                    </div>
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                

                                <div class="mt-3 col-6 ">
                                    <label for="password" class="form-label text-muted fw-italic mb-0">Mot de passe </label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-city icnbgc"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password"
                                            name="password"
                                            placeholder="Mot de passe" >
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                                <div class="mt-3 col-12  ">
                                    <label for="adresse" class="form-label text-muted fw-italic mb-0">Adresse
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-location-dot icnbgc"></i>
                                        </span>
                                        <textarea class="form-control" id="adresse" name="adresse" cols="5" rows="3"></textarea>
                                    </div>
                                    <span class="text-danger">
                                        @error('adresse')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center ">
                                <div class="row">
                                    <div class="">
                                        <button type="submit"
                                            class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                        <button type="reset" name="cancel"
                                            class="btn btn-danger square fw-bold" >Annuler</button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-1">
                                <a href="/">Se Connecter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
