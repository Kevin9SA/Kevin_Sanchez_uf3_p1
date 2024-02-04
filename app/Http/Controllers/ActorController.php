<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActorController
{
    public function listActors()
    {
        $actors = DB::table('actors')->get();
        $title = "Listado de Actores";
        return view('actors.list', ['actors' => $actors, "title" => $title]);
    }

    public function listActorsByDecade(Request $request)
    {
        $decade = $request->input('decade');

        $startYear = $decade;
        $endYear = $decade + 9;
            $actors = DB::table('actors')
                    ->whereBetween(DB::raw('YEAR(birthdate)'), [$startYear, $endYear])
                    ->get();
    
        return view('wellcome', [
            'actors' => $actors,
            'title' => 'Actores de la década ' . $startYear . 's'
        ]);    }

    public function countActors()
    {
        $totalActors = DB::table('actors')->count();

        return view('actors.count', ['totalActors' => $totalActors]);
    }

    public function deleteActor($id)
    {
        $deleted = DB::table('actors')->where('id', $id)->delete(); 

        if ($deleted) {
            return response()->json(['action' => 'delete', 'status' => true]); 
        } else {
            return response()->json(['action' => 'delete', 'status' => false]);
        }
    }
}
