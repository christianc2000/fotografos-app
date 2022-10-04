@extends('adminlte::page')

@section('title', 'Evento')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <p>Crud Evento</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
