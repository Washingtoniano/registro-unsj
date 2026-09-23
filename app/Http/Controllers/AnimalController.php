<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{
    private array $animals = [
        ['id' => 1, 'name' => 'Lion', 'species' => 'Panthera leo'],
        ['id' => 2, 'name' => 'Elephant', 'species' => 'Loxodonta africana'],
        ['id' => 3, 'name' => 'Giraffe', 'species' => 'Giraffa camelopardalis'],
    ];

    public function index(Request $request): View
    {
        return view('animals.index', ['animals' => $request->session()->get('animals', $this->animals)]);
    }

    public function create(): View
    {
        return view('animals.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'species' => ['required', 'string', 'max:255'],
        ]);

        $animals = collect($request->session()->get('animals', $this->animals));
        $nextId = ((int) $animals->max('id')) + 1;

        $animals->push([
            'id' => $nextId,
            ...$validated,
        ]);

        $request->session()->put('animals', $animals->all());

        return to_route('animals.index')->with('status', 'Animal agregado correctamente.');
    }

    public function edit(Request $request, int $id): View
    {
        $animal = collect($request->session()->get('animals', $this->animals))->firstWhere('id', $id);

        abort_if($animal === null, 404);

        return view('animals.edit', ['animal' => $animal]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'species' => ['required', 'string', 'max:255'],
        ]);

        $animals = collect($request->session()->get('animals', $this->animals));
        abort_if($animals->where('id', $id)->isEmpty(), 404);

        $request->session()->put(
            'animals',
            $animals->map(fn (array $animal): array => $animal['id'] === $id
                ? [...$animal, ...$validated]
                : $animal)->values()->all()
        );

        return to_route('animals.index')->with('status', 'Animal actualizado correctamente.');
    }

    public function destroy(Request $request, int $id): RedirectResponse
    {
        $animals = collect($request->session()->get('animals', $this->animals));
        abort_if($animals->where('id', $id)->isEmpty(), 404);

        $request->session()->put(
            'animals',
            $animals->reject(fn (array $animal): bool => $animal['id'] === $id)->values()->all()
        );

        return to_route('animals.index')->with('status', 'Animal eliminado correctamente.');
    }
}
