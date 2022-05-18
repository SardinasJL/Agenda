<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function validarForm(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:3|max:40"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contacto.contacto_index", ["contactos" => Contacto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contacto.contacto_create");
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
        Contacto::create($request->all());
        return redirect()->route("contactos.store")->with(["mensaje" => "Contacto creado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        return view("contacto.contacto_edit", ["contacto" => $contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        $this->validarForm($request);
        $contacto->update($request->all());
        return redirect()->route("contactos.index")->with(["mensaje" => "Contacto actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Contacto $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route("contactos.index")->with(["mensaje" => "Contacto eliminado"]);
    }
}
