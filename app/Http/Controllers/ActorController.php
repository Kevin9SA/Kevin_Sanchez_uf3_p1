<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ActorController
{
    public function listActors()
    {
        $actors = DB::table('actors')->get();
        $title = "Listado de Actores";
        return view('actors.list', ['actors' => $actors, "title" => $title]);
    }

    public function listActorsByDecade($year)
    {
        // Lógica para listar actores por década
    }

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
