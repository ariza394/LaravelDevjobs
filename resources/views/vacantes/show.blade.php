@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />
@endsection

@section('navegacion')    
    @include('ui.categoriasnav')
@endsection

@section('content')
    <h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>
    <div class="mt-10 bm-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="block text-gray-700 font-bold my-2">
                Published: <span class="font-normal">{{$vacante->created_at->diffForHumans()}}</span>
                By:<span class="font-normal">{{$vacante->reclutador->name}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Category: <span class="font-normal">{{$vacante->categoria->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Salary: <span class="font-normal">{{$vacante->salario->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Location: <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
            </p>
            <p class="block text-gray-700 font-bold my-2">
                Experience: <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
            </p>

            <h2 class="text-3xl text-center mt-10 text-gray-700 mb-5">Skills</h2>
            @php
                $arraySkills = explode(",",$vacante->skills);
            @endphp
    
            @foreach($arraySkills as $skill)
                <p class="inline-block rounded border border-gray-500 py-2 px-8 text-gray-700 my-2">
                    {{$skill}}
                </p>            
            @endforeach
            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen" data-title="{{$vacante->titulo}}">
                <img src="/storage/vacantes/{{$vacante->imagen}}" alt="" class="w-40 mt-10">
            </a>
            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>
        </div>
        @if($vacante->activa === 1)
            @include('ui.contacto')
        @endif
    </div>
@endsection
