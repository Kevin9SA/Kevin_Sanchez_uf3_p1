<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms(): array
    {
        $filmsFromJson = Storage::json('/public/films.json');
        $filmsFromDatabase = DB::table('films')->get();
        if (is_string($filmsFromJson)) {
            $Json = json_decode($filmsFromJson, true);
            $films = array_merge($Json, $filmsFromDatabase->toArray());
        }
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    /**
     * List films by year
     */
    public function listFilmsByYear($year = null)
    {
        $films = FilmController::readFilms();

        $films_filtered = array_filter($films, function ($film) use ($year) {
            return is_null($year) || (int)$film['year'] == (int)$year;
        });

        $title = "Listado de películas filtrado por año";
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * List films by genre
     */
    public function listFilmsByGenre($genre = null)
    {
        $films = FilmController::readFilms();

        $films_filtered = array_filter($films, function ($film) use ($genre) {
            return is_null($genre) || strtolower($film['genre']) == strtolower($genre);
        });

        $title = "Listado de películas filtrado por género";
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }
    public function sortFilms()
    {
        $films = FilmController::readFilms();
        usort($films, function ($a, $b) {
            return $b['year'] - $a['year'];
        });

        $title = "Listado de películas ordenado por año (de más nuevo a más antiguo)";
        return view("films.list", ["films" => $films, "title" => $title]);
    }
    public function countFilms()
    {
        $films = FilmController::readFilms();
        $totalFilms = count($films);

        return view("films.counter", ["totalFilms" => $totalFilms]);
    }
    public function create()
    {
        return view('films.create');
    }

    public function createFilm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'year' => 'required|integer',
            'genre' => 'required|string',
            'country' => 'required|string',
            'duration' => 'required|integer',
            'img_url' => 'required|url',
        ]);

    $dataSource = env('DATA_SOURCE');

    if ($dataSource === 'json') {
        $films = $this->readFilms();
        if (!$this->isFilm($films, $request->input('name'))) {
            $newFilm = [
                'name' => $request->input('name'),
                'year' => $request->input('year'),
                'genre' => $request->input('genre'),
                'country' => $request->input('country'),
                'duration' => $request->input('duration'),
                'img_url' => $request->input('img_url'),
            ];

            $films[] = $newFilm;
            Storage::put('/public/films.json', json_encode($films));
            return $this->listFilms();
        } else {
            return redirect('/')->with('error', 'Film name already exists');
        }
    } elseif ($dataSource === 'sql') {
        // Si el origen de datos es SQL
        $newFilm = [
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'duration' => $request->input('duration'),
            'img_url' => $request->input('img_url'),
        ];

        // Insertar los datos en la base de datos utilizando el Query Builder
        DB::table('films')->insert($newFilm);

        return $this->listFilms();
    } else {
        // Manejar el caso en que la bandera DATA_SOURCE no esté configurada correctamente
        return redirect('/')->with('error', 'Invalid data source specified');
    }
    }


    private function isFilm($films, $name)
    {
        foreach ($films as $film) {
            if (strtolower($film['name']) === strtolower($name)) {
                return true;
            }
        }

        return false;
    }

}
