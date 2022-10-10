@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content_header')
    <h3>Evento - {{ $evento->titulo }}</h3>
@stop

@section('content')
    <div class="card row">
        <div class="card-body col-6">
        </div>
        <div class="card-body col-6">
            <form action="{{ route('evento.update', $evento->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="inputTitulo" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                        <input name="titulo" type="text" class="form-control" id="inputtitulo" value="{{$evento->titulo}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGPS" class="col-sm-2 col-form-label">GPS</label>
                    <div class="col-sm-10">
                        <input name="gps" type="text" class="form-control" value="{{$evento->gps}}" id="gps"
                            placeholder="longitud,latitud" onmousedown="return false;" onkeypress="return false;" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 col-form"></div>
                    <div class="col-sm-10">
                        <div id="map" style="height:200px" class="form-control rounded">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputdireccion" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-10">
                        <input name="direccion" type="text" value={{$evento->direccion}} class="form-control" id="inputdireccion"
                            placeholder="Dirección del evento" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputdescripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <textarea name="descripcion" id="descripcion" class="form-control" cols="15" rows="3" required>
                            {{$evento->descripcion}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputfecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                        <input name="fecha" type="date" class="form-control" id="inputfecha" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputhora" class="col-sm-2 col-form-label">Hora</label>
                    <div class="col-sm-10">
                        <input name="hora" type="time" class="form-control" id="inputhora" required>
                    </div>
                </div>
                <x-adminlte-select name="tipo" label="Tipo de Evento" label-class="" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gray">
                            <i class="fa fa-solid fa-key"></i>
                        </div>
                    </x-slot>
                    <option value=0>Privado</option>
                    <option value=1>Pública</option>
                    <option value="{{$evento->id}}" {{old('b_id' , $employee->branch_id)==$branch->id ? 'selected' : ''}}>
                        {{$branch->name}}
                </option>
                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                </x-adminlte-select>
                {{-- SM size, restricted to current month and week days --}}


            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@stop

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -17.7847635,
                    lng: -63.1757515
                },
                center: {
                    lat: {{ -17.7847635 }},
                    lng: {{ -63.1757515 }}
                },
                zoom: 14,
                scrollwheel: true,
            });
            const uluru = {
                lat: -17.7847635,
                lng: -63.1757515
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#gps').val(lat + "," + lng)

                })
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>

@stop
