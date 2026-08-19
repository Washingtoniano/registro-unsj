<?php
//Ejemplo de arreglo asociativo
$persona = array(
    "dni" => "12345678",
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "San Juan"
);
echo "Nombre: " . $persona["nombre"] . "\n"; // Imprime Juan
//Lo mismo en json
/* 
{
    "nombre": "Juan",
    "edad": 30,
    "ciudad": "San Juan"
}
*/

//Arreglo de arreglos
//A
$personas=[
    [
        "dni" => "12345678",
        "nombre" => "Juan",
        "edad" => 30,
        "ciudad" => "San Juan"
    ],
    [
        "dni" => "87654321",
        "nombre" => "Maria",
        "edad" => 25,
        "ciudad" => "Buenos Aires"
    ]
];

// Los mismos en json
/* 
[
    {
        "nombre": "Juan",
        "edad": 30,
        "ciudad": "San Juan"
    },
    {
        "nombre": "Maria",
        "edad": 25,
        "ciudad": "Buenos Aires"
    }
]
*/

foreach ($personas as $persona) {
    echo "Nombre: " . $persona["nombre"] . "\n";
    echo "Edad: " . $persona["edad"] . "\n";
    echo "Ciudad: " . $persona["ciudad"] . "\n";
    echo "DNI: " . $persona["dni"] . "\n";
    echo "-------------------\n";
}

//Agregar una nueva persona al arreglo
$nuevaPersona = [
    "dni" => "11111111",
    "nombre" => "Pedro",
    "edad" => 28,
    "ciudad" => "Córdoba"
];

function agregarPersona( array &$personas, array $nuevaPersona) {
    $personas[] = $nuevaPersona;
}
function listPersonas( array $personas) {
    foreach ($personas as $persona) {
        echo "Nombre: " . $persona["nombre"] . "\n";
        echo "Edad: " . $persona["edad"] . "\n";
        echo "Ciudad: " . $persona["ciudad"] . "\n";
        echo "DNI: " . $persona["dni"] . "\n";
        echo "-------------------\n";
    }
}
$personas[] = $nuevaPersona;


foreach ($personas as $persona) {
    echo "Nombre: " . $persona["nombre"] . "\n";
    echo "Edad: " . $persona["edad"] . "\n";
    echo "Ciudad: " . $persona["ciudad"] . "\n";
    echo "DNI: " . $persona["dni"] . "\n";
    echo "-------------------\n";
}

//llamada a la funcion agregarPersona
$nuevaPersona2 = [
    "nombre" => "Lucia",
    "edad" => 22,
    "ciudad" => "Mendoza",
    "dni" => "22222222"
];
agregarPersona($personas, $nuevaPersona2);
//o

/*
agregarPersona($personas, [
    "nombre" => "Lucia",
    "edad" => 22,
    "ciudad" => "Mendoza",
    "dni" => "22222222"
]);

*/


//llamada a la funcion listPersonas
listPersonas($personas);


//Tarea1: Crear una función que haga busqueda secuencial por DNI. 
//Tarea2: Crear una función que haga busqueda binaria por DNI.
//Tarea3: Crear una función que haga busqueda secuencial por nombre.
