@extends('welcome')
@section('content-pages')

<div>
    <div class="text-center">
        <h1 style="font-size: 70px; color:rgb(82, 86, 89)" class="text-capitalize font-weight-bolder">Student's personal study planner</h1>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        @livewire('start-button')
    </div>
</div>

@endsection
