@extends('layout')
@section('cabecalho')
Temporadas de {{$anime->nome}}
@endsection

@section('conteudo')
<ul class='list-group'>
    @foreach ($temporadas as $temporada)
        <li class='list-group-item mt-2'>
            Temporada {{$temporada->numero}}
        </li>
    @endforeach
</ul>
@endsection