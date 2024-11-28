@extends('2.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-house-medical" title="Médical" url="/medical" text="Cliquer ici" /> 
        <x-card-icon icon="fa-cart-shopping" title="E-commerce " url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-user-group" title="Social " url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-van-shuttle" title="Transport" url="#" text="Cliquer ici" />  
        <x-card-icon icon="fa-cogs" title="Administratif " url="#" text="Cliquer ici" /> 
    </div>
</div> 

@endsection