<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Connexion | MOBIGO</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        html,
        body {
            height: 100%;
            background-image: url('../images/bg_ssa.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="container  mt-5">
        <div class="row justify-content-center ">
            <div class="col-md-6 col-lg-6">
                <livewire:login />
            </div>
        </div>
    </div>

</body>

</html>