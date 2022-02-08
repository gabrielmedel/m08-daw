<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;

class PlanetController extends Controller
{

    public function index()
    {
        $planets = Planet::all();

        return view("planets.llista", ['planets' => $planets]);
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
