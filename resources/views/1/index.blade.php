@extends('1.layout', ['page' => 'Accueil', 'pageSlug' => 'index'])

@section('content')
<div class="container">
    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Gestion des rendez-vous </h3> 
    </div>

    <livewire:gestion-rendezvous1 />

</div> 

@endsection