@extends('adminlte::page')

@section('title', 'Fotografia')

@section('content_header')
    <h1>Fotografía</h1>
@stop

@section('content')
    <p>Crud Fotografía</p>
    <div class="row">

        {{-- <x-adminlte-card theme="dark" theme-mode="outline">
                <button class="btn btn-secondary" type="button">
                    <i class="fa fa-cart-plus"></i>
                </button>
            </x-adminlte-card> --}}

        <div class="col-md-4">
            <x-adminlte-card theme="dark" theme-mode="outline">
                <x-adminlte-button data-toggle="modal" data-target="#modalCustom" class="bg-teal w-full"
                    icon="fa fa-solid fa-plus" />
            </x-adminlte-card>
        </div>


        <form action="{{ route('fotografia.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal" icon="fas fa-bell"
                v-centered static-backdrop scrollable>

                <div style="height:800px;">

                    <input class="form-control my-2" type="file" id="foto" name="foto" accept="image/*">
                    <x-adminlte-select name="selEvento" label="Evento" label-class="text-lightblue" igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-car-side"></i>
                            </div>
                        </x-slot>
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->evento->id }}">{{ $evento->evento->titulo }}</option>
                        @endforeach
                        <!--  <button class="btn btn-success" type="submit">OK</button>-->

                    </x-adminlte-select>

                </div>

                <x-slot name="footerSlot">

                    <button type="submit" class="btn btn-success">Guardar</button>


                    <x-adminlte-button theme="secondary" class="button-danger" label="Dismiss" data-dismiss="modal" />
                </x-slot>

            </x-adminlte-modal>
        </form>
        {{-- Example button to open modal --}}

        @foreach ($fotografias as $foto)
            <div class="col col-md-4">
                <x-adminlte-card theme="dark" theme-mode="outline" class="elevation-3" body-class="bg-gray-800"
                    footer-class="bg-gray-100 border-top rounded border-light">

                    <img src="{{ $foto->url }}" alt="" class="col"
                        style="height: 100%; width: 300px; max-height: 300px">
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="d-flex ml-auto" theme="light" label="submit" icon="fas fa-sign-in" />
                    </x-slot>
                </x-adminlte-card>
                {{--  <x-adminlte-card theme="dark" theme-mode="outline">
                    <img src="{{ $foto->url }}" alt="">
                </x-adminlte-card> --}}
            </div>
        @endforeach
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <style>
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            height: 50px;
        }

        .button-danger {
            background-color: #626562;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            height: 50px;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        $(document).ready(function() {

            let iBox = new _AdminLTE_InfoBox('ibUpdatable');

            let updateIBox = () => {
                // Update data.
                let rep = Math.floor(1000 * Math.random());
                let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
                let progress = Math.round(rep * 100 / 1000);
                let text = rep + '/1000';
                let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
                let description = progress + '% reputation completed to reach next level';

                let data = {
                    text,
                    icon,
                    description,
                    progress
                };
                iBox.update(data);
            };

            setInterval(updateIBox, 5000);
        })
    </script>
@stop
