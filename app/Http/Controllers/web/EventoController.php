<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Fotografo;
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
        $fotografo = Fotografo::findOrFail($user->fotografo->id);
        $eventos = $fotografo->eventoFotografos;

        return view('web.organizador.evento-index', compact('eventos'));
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
        ]);
//  return $request->all();
 //       return $request->all();
        $fechaActual = date('d-m-Y');
        $timeActual= date("G:i");
        if ($fechaActual > $request->fecha) {
            return "se paso de la fecha";
        } else {
            if ($timeActual>$request->hora){
                return "Se paso de la fecha y hora";
            }else{
                return "no se paso";
            }
           
        }
        return "no entra if";
        $evento = new Evento();


        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        if ($request->tipo == 1) {
            $evento->tipo = true;
        } else {
            $evento->tipo = false;
        }

        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->direccion = $request->direccion;
        $evento->gps = $request->gps;
       
        $evento->estado = true;


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
        //
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
        //
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
