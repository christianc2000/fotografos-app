@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content_header')
    <h3>Evento - {{ $evento->titulo }}</h3>
@stop

@section('content')
    <div class="card row">
        <div class="card-body col-12">
            <form action="{{ route('evento.update', $evento->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="inputTitulo" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                        <input name="titulo" type="text" class="form-control" id="inputtitulo"
                            value="{{ $evento->titulo }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGPS" class="col-sm-2 col-form-label">GPS</label>
                    <div class="col-sm-10">
                        <input name="gps" type="text" class="form-control" value="{{ $evento->gps }}"
                            id="gps" placeholder="longitud,latitud" onmousedown="return false;"
                            onkeypress="return false;" required>
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
                        <input name="direccion" type="text" value={{ $evento->direccion }} class="form-control"
                            id="inputdireccion" placeholder="Dirección del evento" required>
                    </div>
                </div>
                <div id="{{ $evento }}" class="div-fecha" style="display: none">hola</div>
                <div class="form-group row">
                    <label for="inputdescripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <textarea name="descripcion" id="descripcion" class="form-control" cols="15" rows="3" required>{{ $evento->descripcion }}
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
                <x-adminlte-select name="tipo" id="tipoSelect" label="Tipo de Evento" label-class=""
                    igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gray">
                            <i class="fa fa-solid fa-key"></i>
                        </div>
                    </x-slot>
                    <option value=0>Privado</option>
                    <option value=1>Pública</option>

                    </option>
                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                </x-adminlte-select>
                {{-- SM size, restricted to current month and week days --}}



        </div>
        <div class="card-footer col-sm-12">
            <x-adminlte-button type="submit" label="Guardar" icon="fas fa-key" class="bg-teal mr-auto" />
            </form>
            <a href="{{ route('evento.index') }}" class="btn btn-xs btn-danger mx-1 shadow" title="Cancelar">
                Cancelar
            </a>
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
        let marker

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
        }

        function cortarEspacio(i, cadena, k) {
            c = "";
            while (i < cadena.length) {
                if (cadena[i] != k) {
                    c = c + cadena[i]
                } else {
                    return c;
                }
                i++;
            }
            return c;
        }
        $(document).ready(function() {
            evento = JSON.parse($('.div-fecha').attr('id'));
            //console.log(evento);
            fecha = evento['fecha'];
            f = cortarEspacio(0, fecha, " ");
            h = cortarEspacio(f.length + 1, fecha, " ");
            $("#inputfecha").val(f);
            $("#inputhora").val(h);
            $("#tipoSelect option[value=" + evento['tipo'] + "]").attr("selected", true);
            //cambiar gps
            evento = JSON.parse($('.div-fecha').attr('id'));
            gps = evento['gps'];
            i = gps.indexOf(',');
            lati = parseFloat(gps.substr(1, i));
            longi = parseFloat(gps.substr(i + 2, gps.length));
            const uluru = {
                lat: -lati,
                lng: -longi
            };
            map.setCenter(uluru);
            var icon = {
                url: 'https://res.cloudinary.com/doxlbgstv/image/upload/v1665375479/logoUbi_j80oia.png', // url
                scaledSize: new google.maps.Size(30, 30), // scaled size
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(15, 33) // anchor
            };
            marker = new google.maps.Marker({
                position: uluru,
                map: map,
                icon: icon,
                draggable: true,
                width: 20
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
        });
    </script>

@stop
