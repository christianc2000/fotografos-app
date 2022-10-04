@extends('adminlte::page')

@section('title', 'Fotografo')

@section('content_header')
    <h1>Fotografos</h1>
@stop

@section('content')
    <p>Crud Fotografo</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
