<?php

namespace App\Http\Controllers;

use App\Models\Planet;

class PlanetController extends Controller
{

    public function index()
    {
        $planets = Planet::all();

        return view("planets.llista", ['planets' => $planets]);
    }

}
