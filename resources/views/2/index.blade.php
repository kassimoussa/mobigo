@extends('2.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-house-medical" title="Médical" url="/medical" text="Cliquer ici" /> 
        <x-card-icon icon="fa-cart-shopping" title="E-commerce " url="/ecommerce" text="Cliquer ici" /> 
        <x-card-icon icon="fa-user-group" title="Social " url="/social" text="Cliquer ici" /> 
        <x-card-icon icon="fa-van-shuttle" title="Transport" url="/transport" text="Cliquer ici" />  
        <x-card-icon icon="fa-file-invoice-dollar" title="Factures " url="/factures" text="Cliquer ici" /> 
        <x-card-icon icon="fa-cogs" title="Administratif " url="/administratif" text="Cliquer ici" /> 
    </div>
</div> 

@endsection