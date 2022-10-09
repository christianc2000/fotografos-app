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
            <x-adminlte-card theme="dark" theme-mode="outline" style="height: 250px">
                <button data-toggle="modal" data-target="#modalCustom" class="bg-teal button-modal" style="height: 100%;">
                    <i class="fa fa-solid fa-plus fa-2x"></i> </button>
            </x-adminlte-card>
        </div>



        <x-adminlte-modal id="modalCustom" title="Subir Fotografía" size="xl" theme="teal" icon="fas fa-bell"
            v-centered static-backdrop scrollable>
            <form action="{{ route('fotografia.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="height:600px;">

                    <input class="form-control my-2" type="file" id="foto" name="foto" accept="image/*">
                    @error('foto')
                        <br>
                        <small>{{ $message }} </small>
                    @enderror
                    <img id="imagenPrevisualizacion">

                    <x-adminlte-select name="evento_id" label="Evento" label-class="text-lightblue" igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fa fa-solid fa-calendar"></i>
                            </div>
                        </x-slot>
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->evento->id }}">{{ $evento->evento->titulo }}</option>
                        @endforeach
                        <!--  <button class="btn btn-success" type="submit">OK</button>-->
                    </x-adminlte-select>
                    <x-adminlte-select name="tipo" label="Tipo de Foto" label-class="text-lightblue" igroup-size="lg">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fa fa-solid fa-image"></i>
                            </div>
                        </x-slot>
                        <option value=0>Privado</option>
                        <option value=1>Pública</option>

                        <!--  <button class="btn btn-success" type="submit">OK</button>-->
                    </x-adminlte-select>
                    <label for="radio2" class="text-lightblue">Elegir estado de fotografía</label>
                    <div class="row row-cols-6">
                        <div class="col col-2">
                            <input type="radio" name="publicado" id="radio1" value=1 checked />
                            <label for="radio1" class="text-bg-light rounded-1">Publicar</label>
                        </div>
                        <div class="col col-2">
                            <input type="radio" name="publicado" id="radio1" value=0 />
                            <label for="radio2" class="text-bg-light rounded-1">Borrador</label>
                        </div>

                    </div>
                </div>

                <x-slot name="footerSlot">

                    <button type="submit" class="btn btn-success">Guardar</button>

            </form>

            <x-adminlte-button theme="secondary" class="button-danger" label="Dismiss" data-dismiss="modal" />
            </x-slot>

        </x-adminlte-modal>
        {{-- Example button to open modal --}}

        @foreach ($fotografias as $foto)
            <div class="col col-md-4">
                <x-adminlte-card theme="dark" theme-mode="outline" class="elevation-3"
                    style="height: 250px; align-items: center" body-class="bg-gray-800"
                    footer-class="bg-gray-100 border-top rounded border-light">

                    <img src="{{ $foto->url }}" alt="" class="col" style="height: 100%; width: auto;">
                    <x-slot name="footerSlot">
                        <x-adminlte-button class="d-flex ml-auto" theme="light" label="Editar" icon="fas fa-sign-in" />
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

        .button-modal {
            background-color: #258d25;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            height: 100%;
            width: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script>
        console.log('Hi!');
    </script>
    <script>
        $(document).ready(function() {
            console.log("hola mundo");


            //cloudinary.url().transformation(new Transformation().quality(60)).imageTag(url);

            // Obtener referencia al input y a la imagen

            const $seleccionArchivos = document.querySelector("#foto"),
                $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

            // Escuchar cuando cambie
            $seleccionArchivos.addEventListener("change", () => {
                // Los archivos seleccionados, pueden ser muchos o uno
                const archivos = $seleccionArchivos.files;
                // Si no hay archivos salimos de la función y quitamos la imagen
                if (!archivos || !archivos.length) {
                    $imagenPrevisualizacion.src = "";
                    return;
                }
                // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                const primerArchivo = archivos[0];
                // Lo convertimos a un objeto de tipo objectURL
                const objectURL = URL.createObjectURL(primerArchivo);
                // Y a la fuente de la imagen le ponemos el objectURL
                $imagenPrevisualizacion.src = objectURL;
                $('#imagenPrevisualizacion').width(200);
            });
        });
    </script>
@stop
