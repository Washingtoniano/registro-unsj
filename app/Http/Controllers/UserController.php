<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Definimos un arreglo asociativo con datos ficticios
        $users=[
            [
                "id"=>1,
                "nombre"=>"Ana Garcia",
                "email"=>"ana@example.com",
                "rol"=> "Administrador",
            ],
            [
                "id"=>2,
                "nombre"=>"Juan Perez",
                "email"=>"juan@example.com",
                "rol"=> "Editor"
            ],
            [
                "id"=>3,
                "nombre"=>"Maria Lopez",
                "email"=>"maria@example.com",
                "rol"=>"Suscriptor"
            ]
        ];
        //Al retornar el arreglo, Laravel asume que quieres una respuesta JSON
        return $users;
    }
}
