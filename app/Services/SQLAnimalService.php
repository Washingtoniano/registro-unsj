<?php
namespace App\Services;

use App\Contracts\AnimalServiceInterface;
use Illuminate\Support\Facades\DB;
use app\Exceptions\AnimalNotFoundException;
class SQLAnimalService implements AnimalServiceInterface
{
    public function All(): array
    {
        $rows = DB::select(
        'SELECT id, name, species, age FROM animals ORDER BY id ASC'
        );
        return array_map(function ($row) {
        return (array) $row;
        }, $rows);
                
    }
    public function Find(string $id): array
    {
        $row = DB::selectOne(
        'SELECT id, name, species, age FROM animals WHERE id = ?', [$id]
        );
        if (!$row) {
        // ¿Qué hacer si no existe el registro?
            AnimalNotFoundException::forID($id);
        }
        return (array) $row;
    }
    public function Create(array $data): array
    {
        DB::insert(
        'INSERT INTO animals (name, species, age) VALUES (?, ?, ?)',
        [
        $data['name'],
        $data['species'],
        (int) $data['age']
        ]
        );
        // ¿Cómo obtenemos el ID asignado para cumplir la firma?
        $id = DB::getPdo()->lastInsertId();
        return $this->Find($id);
    }
    public function update(string $id, array $data): array
    {
        // 1. Verificación previa (falla rápido con 404):
        $this->find($id);
        // 2. Sentencia SQL con los nuevos datos:
        // UPDATE animals SET name = ?, species = ?, age = ? WHERE id = ?
        DB::update(
            'UPDATE animals SET name = ?, species = ?, age = ? WHERE id = ?',
            [
                $data['name'],
                $data['species'],
                (int) $data['age'],
                $id
            ]
        );
        return $this->Find($id);
    }


    public function delete(string $id): bool
    {
        // Asegura existencia o lanza excepción:
        $this->find($id);
        $affected = DB::delete(
        'DELETE FROM animals WHERE id = ?',
        [$id]
        );
        return $affected > 0;
    }
    public function reset(): void
    {
        DB::statement('DELETE FROM animals');
        // Pro-tip_ Reiniciar el puntero incremental de SQLite
        DB::statement('DELETE FROM sqlite_sequence WHERE name = "animals"');
    }
    
}
