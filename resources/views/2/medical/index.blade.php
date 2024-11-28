@extends('2.layout', ['page' => 'Onglet Médical', 'pageSlug' => 'medical'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Onglet Médical</h3> 
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-house-medical" title="Rendez-vous" url="/medical/rendez-vous" text="Cliquer ici" /> 
        <x-card-icon icon="fa-cart-shopping" title="Ordonnance" url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-user-group" title="Dossier Médical " url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-van-shuttle" title="Articles médicaux" url="#" text="Cliquer ici" />   
    </div>
</div> 

@endsection