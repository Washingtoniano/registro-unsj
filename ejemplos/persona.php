<?php
class Persona{
    private string $nombre;
    private int $edad;

    public function __construct (string $nombre,int $edad)
    {
        $this->nombre=$nombre;
        $this->edad=$edad;
    }
    public function saludar(): string{
        return "Hola, mi nombre es ".$this->nombre . "y tengo" .$this->edad . "años\n";
    }
}
$persona =new Persona("juan",30);
echo $persona->saludar();