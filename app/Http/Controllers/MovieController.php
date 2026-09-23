<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    private array $defaultMovies = [
        ['id' => 1, 'title' => 'Inception', 'director' => 'Christopher Nolan', 'year' => 2010],
        ['id' => 2, 'title' => 'The Matrix', 'director' => 'Lana Wachowski, Lilly Wachowski', 'year' => 1999],
        ['id' => 3, 'title' => 'Interstellar', 'director' => 'Christopher Nolan', 'year' => 2014],
    ];

    public function index(Request $request): View
    {
        return view('movies.index', ['movies' => $request->session()->get('movies', $this->defaultMovies)]);
    }

    public function create(): View
    {
        return view('movies.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'between:1888,'.now()->year],
        ]);

        $movies = collect($request->session()->get('movies', $this->defaultMovies));
        $nextId = ((int) $movies->max('id')) + 1;

        $movies->push([
            'id' => $nextId,
            ...$validated,
        ]);

        $request->session()->put('movies', $movies->all());

        return to_route('movies.index')->with('status', 'Película agregada correctamente.');
    }

    public function edit(Request $request, int $id): View
    {
        $movie = collect($request->session()->get('movies', $this->defaultMovies))
            ->firstWhere('id', $id);

        abort_if($movie === null, 404);

        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'director' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'between:1888,'.now()->year],
        ]);

        $movies = collect($request->session()->get('movies', $this->defaultMovies))
            ->map(fn (array $movie): array => $movie['id'] === $id
                ? [...$movie, ...$validated]
                : $movie)
            ->values()
            ->all();

        abort_if(collect($movies)->where('id', $id)->isEmpty(), 404);

        $request->session()->put('movies', $movies);

        return to_route('movies.index')->with('status', 'Película actualizada correctamente.');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $movies = collect($request->session()->get('movies', $this->defaultMovies));

        abort_if($movies->where('id', $id)->isEmpty(), 404);

        $request->session()->put(
            'movies',
            $movies->reject(fn (array $movie): bool => $movie['id'] === $id)->values()->all()
        );

        return to_route('movies.index')->with('status', 'Película eliminada correctamente.');
    }
}
