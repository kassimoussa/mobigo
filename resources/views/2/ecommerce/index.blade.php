@extends('2.layout', ['page' => 'Ecommerce', 'pageSlug' => 'ecommerce'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Ecommerce</h3> 
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4 py-2 d-flex justify-content-center">
        <x-card-icon icon="fa-shop" title="Vendre en ligne" url="#" text="Cliquer ici" /> 
        <x-card-icon icon="fa-cart-shopping" title="Acheter en ligne" url="#" text="Cliquer ici" />    
    </div>
</div> 

@endsection