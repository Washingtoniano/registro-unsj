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
    echo"Personas:\n";
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


function buscarporDNI(array $personas,string $dni)
{
    foreach ($personas as $persona)
        {
            if ($persona['dni']==$dni)
                {
                    echo"Se econtro a la persona de dni $dni \n";
                    echo "Nombre: " . $persona["nombre"] . "\n";
                    echo "Edad: " . $persona["edad"] . "\n";
                    echo "Ciudad: " . $persona["ciudad"] . "\n";
                    echo "DNI: " . $persona["dni"] . "\n";
                    echo "-------------------\n";
                } 
        }
}
function ordenar(array $personas){
    sort($personas,SORT_STRING);
}
function buscarporDNIBinarioA(array $personas, $dni)
{
    ordenar($personas);
    $inicio=0;
    $fin=sizeof($personas)-1;
    while ($inicio<=$fin){
        $mitad=($inicio+$fin)/2;
        if ($personas[$mitad]['dni']==$dni){
            echo "Se encontro a la persona de DNI: $dni\n";
            echo "Nombre: " . $personas[$mitad]["nombre"] . "\n";
            echo "Edad: " . $personas[$mitad]["edad"] . "\n";
            echo "Ciudad: " . $personas[$mitad]["ciudad"] . "\n";
            echo "DNI: " . $personas[$mitad]["dni"] . "\n";
            echo "-------------------\n";
        }
        elseif($personas[$mitad]["dni"]<$dni)
            {
                $inicio=$mitad+1;
            }
        else{
            $fin=$mitad-1;
        }

    }
    if($inicio>$fin){
        echo "No se encontro a la persona de DNI: $dni\n";
    }
}
function buscarporDNIBinario(array $personas, $dni){
    
    //Ordenar el arreglo por dni
    usort($personas, function($a, $b) {
        return $a['dni'] <=> $b['dni'];
    });
    $inicio = 0;
    $fin = count($personas) - 1;
    while ($inicio <= $fin) {
        $medio = intdiv($inicio + $fin, 2);
        if ($personas[$medio]['dni'] == $dni) {
            echo"Se econtro a la persona de dni $dni \n";
            echo "Nombre: " . $personas[$medio]["nombre"] . "\n";
            echo "Edad: " . $personas[$medio]["edad"] . "\n";
            echo "Ciudad: " . $personas[$medio]["ciudad"] . "\n";
            echo "DNI: " . $personas[$medio]["dni"] . "\n";
            echo "-------------------\n";
            return;
        } elseif ($personas[$medio]['dni'] < $dni) {
            $inicio = $medio + 1;
        } else {
            $fin = $medio - 1;
        }
    }
    echo "No se encontro a la persona de dni $dni \n";
}
function buscarporNombre(array $personas,string $nombre)
{
    foreach($personas as $persona)
        {
            if(strtoupper($persona['nombre']) == strtoupper($nombre))
                {
                    echo"Se econtro a la persona de nombre $nombre \n";
                    echo "Nombre: " . $persona["nombre"] . "\n";
                    echo "Edad: " . $persona["edad"] . "\n";
                    echo "Ciudad: " . $persona["ciudad"] . "\n";
                    echo "DNI: " . $persona["dni"] . "\n";
                    echo "-------------------\n";                    
                }

        }
}


 buscarporDNI($personas,12345678);
 buscarporNombre($personas,'lucia');
 buscarporDNIBinario($personas,87654321);
 