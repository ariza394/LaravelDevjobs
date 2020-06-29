@extends('layouts.app')

@section('navegacion')    
    @include('ui.adminnav')
@endsection
@section('content')
    <h1 class="text-2xl text-center mt-10">Notifications</h1>
    @if(count($notificaciones) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach($notificaciones as $notificacion)
                @php
                    $data = $notificacion->data
                @endphp
                
                <li class="p-5 border border-gray-400 mb-5">
                    <p class="mb-4 ">
                        New Canditate in: <span class="font-bold">{{$data['vacante']}}</span>
                    </p>
                    <p class="mb-4 ">
                        It was sent at: <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                    </p>
                    <a 
                        href="{{route('candidato.index',['id'=>$data['id_vacante']])}}"
                        class="bg-teal-500 p-3 inline-block text-xs font-bold uppercase text-white"
                    >
                        Explore Candidates
                    </a>
                </li>

                

            @endforeach
        </ul>
    @else
        <p class="text-center mt-5">You dont have notifications</p>
    @endif
@endsection