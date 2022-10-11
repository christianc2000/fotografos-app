<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Fotografo;
use App\Models\Organizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo == "O") {
            $organizador = Organizador::findOrFail($user->organizador->id);
            $eventos = $organizador->eventos;

            return view('web.organizador.evento-index', compact('eventos'));
        } else if ($user->tipo == "F") {
            $fotografo = Fotografo::findOrFail($user->fotografo->id);
            $eventos = $fotografo->eventoFotografos;
            return view('web.organizador.evento-index', compact('eventos'));
        } else {
            return "Error no tiene autorización";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fotografosEvento($id)
    {
        $evento = Evento::findOrFail($id);
        return $evento->eventoFotografos;
        // return $evento->
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $request->validate([
            "titulo" => "required|string|max:30",
            "gps" => "required",
            "direccion" => "required|string",
            "descripcion" => "required|string",
            "tipo" => "required|string|max:1",
            "fecha" => "required",
            "hora" => "required"
        ]);


        function checkThePast($time)
        {
            $convertToUNIXtime = strtotime($time);

            return $convertToUNIXtime < time();
        }
        $fechaevento = $request->fecha . " " . $request->hora;


        $evento = new Evento();

        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        if ($request->tipo == 1) {
            $evento->tipo = true;
        } else {
            $evento->tipo = false;
        }

        $evento->fecha = $fechaevento;
        $evento->direccion = $request->direccion;
        $evento->gps = $request->gps;
        if (checkThePast($fechaevento)) {
            $evento->estado = false;
        } else {
            $evento->estado = true;
        }
        $evento->organizador_id = Auth::user()->organizador->id;
        $evento->save();
        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $evento = Evento::findOrFail($id);

        return view('web.organizador.evento-edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            "titulo" => "required|string|max:30",
            "gps" => "required",
            "direccion" => "required|string",
            "descripcion" => "required|string",
            "tipo" => "required|string|max:1",
            "fecha" => "required",
            "hora" => "required"
        ]);


        $evento = Evento::findOrFail($id);
        $fechaevento = $request->fecha . " " . $request->hora;
        function checkThePast2($time)
        {
            $convertToUNIXtime = strtotime($time);

            return $convertToUNIXtime < time();
        }
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        if ($request->tipo == 1) {
            $evento->tipo = true;
        } else {
            $evento->tipo = false;
        }

        $evento->fecha = $fechaevento;
        $evento->direccion = $request->direccion;
        $evento->gps = $request->gps;
        if (checkThePast2($fechaevento)) {
            $evento->estado = false;
        } else {
            $evento->estado = true;
        }
        $evento->organizador_id = Auth::user()->organizador->id;
        $evento->save();
        return redirect()->route('evento.index');
    }
    public function compartir($id)
    {
        $evento=Evento::findOrFail($id);
        return view('web.organizador.evento-compartir',compact('evento'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
