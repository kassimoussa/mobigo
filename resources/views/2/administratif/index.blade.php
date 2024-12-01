@extends('2.layout', ['page' => 'Administraif', 'pageSlug' => 'administratif'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Administraif</h3> 
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-id-card" title="Population" url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-passport" title="Sortie" url="#" text="Cliquer ici" />   
        <x-card-icon icon="fa-stamp" title="District" url="#" text="Cliquer ici" />  
    </div>
</div> 

@endsection