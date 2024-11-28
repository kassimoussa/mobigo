@extends('2.layout', ['page' => "Gestion des rendez-vous", 'pageSlug' => 'medical'])
@section('content')
<div class="container">
    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Gestion des rendez-vous </h3> 
    </div>

    <livewire:gestion-rendezvous />

</div> 

@endsection