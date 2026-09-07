<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $peliculas = [
            [
                'id' => 1,
                'nombre' => 'The Matrix',
                'genero' => 'Sci-Fi',
                'year' => 1999,
            ],
            [
                'id' => 2,
                'nombre' => 'Inception',
                'genero' => 'Thriller',
                'year' => 2010,
            ],
            [
                'id' => 3,
                'nombre' => 'Interstellar',
                'genero' => 'Sci-Fi',
                'year' => 2014,
            ],
            [
                'id' => 4,
                'nombre' => 'The Dark Knight',
                'genero' => 'Action',
                'year' => 2008,
            ],
            [
                'id' => 5,
                'nombre' => 'Pulp Fiction',
                'genero' => 'Crime',
                'year' => 1994,
            ],
        ];

        session([
            'peliculas' => $peliculas,
        ]);

        return view('movies.index');
    }

    public function edit(int $id): View
    {
        $pelicula = collect(session('peliculas', []))->firstWhere('id', $id);

        abort_unless($pelicula, 404);

        return view('movies.edit', compact('pelicula'));
    }

    public function update(int $id): RedirectResponse
    {
        return redirect()->route('movies.index');
    }
}
