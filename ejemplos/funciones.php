<?php
//Ejemplo de una funcion simple
function saludar($nombre) {
    return "Hola, " . $nombre . "!";
}
//Ejemplo de una funcion con parametros opcionales
function calcularArea(float $base, ?float $altura = null) {
    if ($altura === null) {
        $altura = $base;
    }
    return $base * $altura;
}

//LLamada a la funcion saludar
echo saludar("Juan") . "\n";
//LLamada a la funcion calcularArea con ambos parametros
echo "Area del rectangulo: " . calcularArea(5, 10) . "\n";
//LLamada a la funcion calcularArea con solo el parametro base, unsado el valor por defecto para altura
echo "Area del cuadrado: " . calcularArea(4) . "\n";