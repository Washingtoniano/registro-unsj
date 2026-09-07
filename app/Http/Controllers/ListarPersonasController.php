<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarPersonasController extends Controller
{
    //
    public function index()
    {
        $persona=[
            "Juan Perez",
            "Maria Gomez",
            "Carlos Rodriguez",
            "Ana Martinez",

        ];
    
        return $personas;
    }
    
}
