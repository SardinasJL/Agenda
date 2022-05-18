<?php

namespace App\Http\Controllers;

use App\Models\Tipored;
use Illuminate\Http\Request;

class TiporedController extends Controller
{
    /**
     * Valida los formularios
     *
     * @param Request $request
     */
    public function validarForm(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:3|max:50"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tipored.tipored_index", ["tiposredes" => Tipored::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tipored.tipored_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validarForm($request);
        Tipored::create($request->all());
        return redirect()->route("tiposredes.index")->with(["mensaje" => "Tipo de red creada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tipored $tipored
     * @return \Illuminate\Http\Response
     */
    public function show(Tipored $tipored)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tipored $tipored
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipored $tipored)
    {
        return view("tipored.tipored_edit", ["tipored" => $tipored]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tipored $tipored
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipored $tipored)
    {
        $this->validarForm($request);
        $tipored->update($request->all());
        return redirect()->route("tiposredes.index")->with(["mensaje" => "Tipo de red actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tipored $tipored
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipored $tipored)
    {
        $tipored->delete();
        return redirect()->route("tiposredes.index")->with(["mensaje" => "Tipo de red eliminado"]);
    }
}
