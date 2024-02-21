<?php

namespace App\Http\Controllers;

use App\Models\actor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActorController
{
    public function listActors()
    {
        //$actors = DB::table('actors')->get();
        $actors = actor::all();
        $title = "Listado de Actores";
        return view('actors.list', ['actors' => $actors, "title" => $title]);
    }

    public function listActorsByDecade(Request $request)
    {
        $decade = $request->input('decade');

        $startYear = $decade;
        $endYear = $decade + 9;
            // $actors = DB::table('actors')
            //         ->whereBetween(DB::raw('YEAR(birthdate)'), [$startYear, $endYear])
            //         ->get();
        $actors = Actor::whereYear('birthdate', '>=', $startYear)
            ->whereYear('birthdate', '<=', $endYear)
            ->get();

            return view('welcome', [
            'actors' => $actors,
            'title' => 'Actores de la década ' . $startYear . 's'
        ]);    }

    public function countActors()
    {
        //$totalActors = DB::table('actors')->count();
        $totalActors = actor::count();
        return view('actors.count', ['totalActors' => $totalActors]);
    }

    public function deleteActor($id)
    {
        $deleted=actor::where('id', "$id")->delete();
        // $deleted = DB::table('actors')->where('id', $id)->delete(); 

        if ($deleted) {
            return response()->json(['action' => 'delete', 'status' => true]); 
        } else {
            return response()->json(['action' => 'delete', 'status' => false]);
        }
    }

    public function updateActor($id, Request $request)
    {         
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'country' => 'required',
            'img_url' => 'required',
        ]);
        $updated = DB::table('actors')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'birthdate' => $request->birthdate,
                'country' => $request->country,
                'img_url' => $request->img_url,
            ]);        
        if ($updated) {            
            return response()->json(['action' => 'update', 'status' => true]); 
        } else {
            return response()->json(['action' => 'update', 'status' => false]);
        }
    }
}
