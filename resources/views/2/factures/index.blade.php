@extends('2.layout', ['page' => 'Factures', 'pageSlug' => 'factures'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Factures</h3> 
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-bolt" title="EDD" url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-droplet" title="ONEAD" url="#" text="Cliquer ici" />   
        <x-card-icon icon="fa-globe" title="Djibouti Telecom" url="#" text="Cliquer ici" />  
    </div>
</div> 

@endsection