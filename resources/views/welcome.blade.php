@extends('layouts.app')

@section('content')
        <style>
            .background-container {
                background-image: url('{{ asset("images/neve2.jpg") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height: 100vh;
            }

        </style>
<div class="container-fluid background-container d-flex flex-column justify-content-center align-items-center text-center h-200">
   
        <h1 class="w-50 h-500">
            Para quem almeja alcançar seus objetivos
        </h1>
        <p>
            A organização que você precisa, no ritmo que você vive
        </p>
    
    </div>
@endsection