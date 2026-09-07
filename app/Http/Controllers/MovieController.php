<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $peliculas = [
            [
                "id" => 1,
                "nombre" => "The Matrix",
                "genero" => "Sci-Fi",
                "year" => 1999,
            ],
            [
                "id" => 2,
                "nombre" => "Inception",
                "genero" => "Thriller",
                "year" => 2010,
            ],
            [
                "id" => 3,
                "nombre" => "Interstellar",
                "genero" => "Sci-Fi",
                "year" => 2014,
            ],
            [
                "id" => 4,
                "nombre" => "The Dark Knight",
                "genero" => "Action",
                "year" => 2008,
            ],
            [
                "id" => 5,
                "nombre" => "Pulp Fiction",
                "genero" => "Crime",
                "year" => 1994,
            ],
        ];

        session([
            'peliculas' => $peliculas,
        ]);
    }
}
