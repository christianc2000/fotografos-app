@extends('adminlte::page')

@section('title', 'Evento')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    {{-- Modal Crear --}}
    <x-adminlte-modal id="modalCrearEvento" title="New Evento" size="lg" theme="lighblue" icon="fa fa-solid fa-calendar"
        v-centered static-backdrop scrollable>
        <div style="height:800px;">
            <form action="{{ route('evento.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="inputtitulo" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input name="titulo" type="text" class="form-control" id="inputtitulo"
                            placeholder="Título del evento" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGPS" class="col-sm-2 col-form-label">GPS</label>
                    <div class="col-sm-10">
                        <input name="gps" type="text" class="form-control" id="gps"
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
                        <input name="direccion" type="text" class="form-control" id="inputdireccion"
                            placeholder="Dirección del evento" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputdescripcion" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <textarea name="descripcion" id="descripcion" class="form-control" cols="15" rows="3" required></textarea>
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

                    <!--  <button class="btn btn-success" type="submit">OK</button>-->
                </x-adminlte-select>
                {{-- SM size, restricted to current month and week days --}}


        </div>
        <x-slot name="footerSlot">
            <x-adminlte-button type="submit" label="Guardar" icon="fas fa-key" class="bg-teal mr-auto" />
            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
            </form>
        </x-slot>
    </x-adminlte-modal>
    {{-- Example button to open modal --}}
    {{-- Modal Editar --}}

    <div class="card">
        <div class="card-header">

            <x-adminlte-button label="Crear" data-toggle="modal" id="btn-crear" icon="fas fa-solid fa-plus"
                data-target="#modalCrearEvento" class="bg-teal mr-auto" />
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (Auth::user()->tipo == 'O')
                        @foreach ($eventos as $ev)
                            <tr>
                                <td>{{ $ev->titulo }}</td>
                                <td>
                                    @if ($ev->tipo == true)
                                        Público
                                    @else
                                        Privado
                                    @endif
                                </td>
                                <td>{{ $ev->fecha }}</td>
                                <td>
                                    @if ($ev->estado == true)
                                        Vigente
                                    @else
                                        Fuera de tiempo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('evento.edit',$ev->id)}}" class="btn btn-xs btn-default text-info mx-1 shadow" title="Editar">
                                        <i class="fa fas fa-cogs"></i>
                                    </a>
                                    <a href="{{route('evento.compartir',$ev->id)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fas fa-share-alt"></i>
                                    </a>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($eventos as $ev)
                            <tr>
                                <td>{{ $ev->evento->titulo }}</td>
                                <td>
                                    @if ($ev->evento->tipo == true)
                                        Público
                                    @else
                                        Privado
                                    @endif
                                </td>
                                <td>{{ $ev->evento->fecha }}</td>
                                <td>
                                    @if ($ev->evento->estado == true)
                                        Publicado
                                    @else
                                        Borrador
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif



                </tbody>

            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">

    <style>
        .container-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@stop

@section('js')



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#tabla').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    lengthMenu: 'Mostrar' + `
                <select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="-1">Todo</option>
                </select>   
                ` + ' registros por página',
                    zeroRecords: 'Nada encontrado - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponible',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: 'Buscar:',
                    paginate: {
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                },
            });
        });
    </script>
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
