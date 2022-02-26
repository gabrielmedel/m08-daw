<?php

namespace App\Http\Controllers;

use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperHeroisController extends Controller
{

    public function index()
    {
        //
        // Recuperem una col·lecció amb tots els planetes de la BD
        $superherois = Superhero::all();

        // Carreguem la vista planets/index.blade.php
        // i li passem la llista de planetes
        return view('superherois.index', compact('superherois'));
    }

    public function create()
    {
        $instancia = new PlanetController();
        $planets   = $instancia->getAll();
        return view("superherois.create", compact('planets'));
    }

    public function store(Request $request)
    {
        // Validació dels camps
        $request->validate([
            'realName'  => 'required | max:75',
            'heroName'  => 'required | unique:superheroes | max:25',
            'gender'    => 'required | in:male,female',
            'planet_id' => 'required | exists:planets,id',

        ]);

        $superhero            = new Superhero();
        $superhero->realname  = $request->realName;
        $superhero->heroname  = $request->heroName;
        $superhero->gender    = $request->gender;
        $superhero->planet_id = $request->planet;
        $superhero->save();

        return redirect()->route('superherois.index')
            ->with('success', 'SuperHeroi creat correctament.');
    }
}
