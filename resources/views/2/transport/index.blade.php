@extends('2.layout', ['page' => "Transport", 'pageSlug' => 'transport'])
@section('content')
<div class="container">
    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Transport </h3> 
    </div>

    <livewire:gestion-transport />

</div> 

@endsection