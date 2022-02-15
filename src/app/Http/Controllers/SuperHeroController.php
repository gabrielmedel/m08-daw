<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperHeroController extends Controller
{

    public function create()
    {
        //
        return view("superherois.create");
    }

    public function store(Request $request)
    {
        // Validació dels camps

    }

}
