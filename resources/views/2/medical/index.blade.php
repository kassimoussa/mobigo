@extends('2.layout', ['page' => 'Médical', 'pageSlug' => 'medical'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Médical</h3> 
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-user-doctor" title="Rendez-vous" url="/medical/rendez-vous" text="Cliquer ici" /> 
        <x-card-icon icon="fa-prescription-bottle-medical" title="Ordonnance" url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-book-medical" title="Dossier Médical " url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-square-plus" title="Articles médicaux" url="#" text="Cliquer ici" />   
    </div>
</div> 

@endsection