<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Recuperem una col·lecció amb tots els planetes de la BD
        $planets = Planet::all();

        // Carreguem la vista planets/index.blade.php
        // i li passem la llista de planetes
        return view('planets.index', compact('planets'));
    }

    public function show($id)
    {
        // Obtenim un objecte Planet a partir del seu id
        $planet = Planet::findOrFail($id);
        // carreguem la vista i li passem el planeta que volem visualitzar
        return view('planets.show', compact('planet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("planets.create");
    }

    public function store(Request $request)
    {
        // Validació dels camps
        $request->validate([
            'name' => 'required',
        ]);

        // Primera forma: breu,insegura, necessita tenir array $fillable al model
        Planet::create($request->all());

        return redirect()->route('planets.index')
            ->with('success', 'Planeta creat correctament.');
        // Segona forma: més llarg...més segur..

        // $planet = new Planet;
        // $planet->name = $request->name;
        // $planet->save();

    }

    public function edit($id)
    {
        //
        $planet = Planet::findOrFail($id);
        return view('planets.edit', compact('planet'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        // Opcio 1
        $planet = Planet::findOrFail($id);
        $planet->update($request->all());

        // Opcio 2
        // $planet->name = $request->name;
        // $planet->save();

        return redirect()->route('planets.index')
            ->with('success', 'Planet actualitzat correctament');
    }

    public function destroy($id)
    {
        //  Obtenim el planeta que volem esborrar
        $planet = Planet::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        try {
            $result = $planet->delete();

        } catch (\Illuminate\Database\QueryException$e) {
            return redirect()->route('planets.index')
                ->with('error', 'Error esborrant el planeta');
        }
        return redirect()->route('planets.index')
            ->with('success', 'Planeta esborrat correctament.');
    }

    public function delete($id)
    {
        $planet = Planet::findOrFail($id);
        try {
            $planet->delete();
        } catch (\Illuminate\Database\QueryException$e) {
            return redirect('planets')->with('status', 'No es pot esborrar');
        }
        return redirect('planets')->with('status', 'Planeta esborrat');

    }

    public function add(Request $request)
    {

        $planet       = new Planet;
        $planet->name = $request->input('planeta');
        $planet->save();

        return redirect('planets')->with('status', 'Planeta Creat');

    }

    public function formNew()
    {
        return view('planets.newPlaneta');
    }

}
