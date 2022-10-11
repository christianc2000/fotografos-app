@extends('adminlte::page')

@section('title', 'Compartir')

@section('content_header')
    <h1><p> {{$evento->titulo}}   <i class="fa fas fa-share-alt"></i></p></h1>
@stop

@section('content')
    <p>Compartir Evento</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop