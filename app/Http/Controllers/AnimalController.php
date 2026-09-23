<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AnimalController extends Controller
{
    private array $animals = [
        ['id' => 1, 'name' => 'Lion', 'species' => 'Panthera leo'],
        ['id' => 2, 'name' => 'Elephant', 'species' => 'Loxodonta africana'],
        ['id' => 3, 'name' => 'Giraffe', 'species' => 'Giraffa camelopardalis'],
    ];

    public function index(): View
    {
        return view('animals.index', ['animals' => $this->animals]);
    }
}
