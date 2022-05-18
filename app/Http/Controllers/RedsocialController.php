<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Redsocial;
use App\Models\Tipored;
use Illuminate\Http\Request;

class RedsocialController extends Controller
{
    /**
     * Valida el formualario
     *
     * @param Request $request
     */
    public function validarForm(Request $request)
    {
        $request->validate([
            "url" => "required|min:3|max:50",
            "tipored_id" => "required"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Contacto $contacto)
    {
        return view("redsocial.redsocial_index",
            ["contacto" => $contacto, "redessociales" => Redsocial::where("contacto_id", $contacto->id)->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contacto $contacto)
    {
        return view("redsocial.redsocial_create", ["contacto" => $contacto, "tiposredes" => Tipored::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Contacto $contacto
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contacto $contacto, Request $request)
    {
        $this->validarForm($request);
        $request["contacto_id"] = $contacto->id;
        Redsocial::create($request->all());
        return redirect()->route("contactos.redessociales.index", [$contacto])
            ->with(["mensaje" => "Red social creada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Redsocial $redsocial
     * @return \Illuminate\Http\Response
     */
    public function show(Redsocial $redsocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contacto $contacto
     * @param \App\Models\Redsocial $redsocial
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto, Redsocial $redsocial)
    {
        return view("redsocial.redsocial_edit",
            ["contacto" => $contacto, "redsocial" => $redsocial, "tiposredes" => Tipored::all()]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Contacto $contacto
     * @param \App\Models\Redsocial $redsocial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto, Redsocial $redsocial)
    {
        $this->validarForm($request);
        $request["contacto_id"] = $contacto->id;
        $redsocial->update($request->all());
        return redirect()->route("contactos.redessociales.index", [$contacto])
            ->with(["mensaje" => "Red social actualizada"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contacto $contacto
     * @param \App\Models\Redsocial $redsocial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto, Redsocial $redsocial)
    {
        $redsocial->delete();
        return redirect()->route("contactos.redessociales.index", [$contacto])
            ->with(["mensaje" => "Red social eliminada"]);
    }
}
