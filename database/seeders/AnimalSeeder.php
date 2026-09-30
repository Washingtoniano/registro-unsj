<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals=[
            ['name' => 'Lion', 'species' => 'Panthera leo', 'age' => 5],
            ['name' => 'Elephant', 'species' => 'Loxodonta africana', 'age' => 10],
            ['name' => 'Giraffe', 'species' => 'Giraffa camelopardalis', 'age' => 7],
        ];
        
        foreach ($animals as $animal){
            DB::insert(
                'insert into animals (name, species, age) values (?, ?, ?)',
                    [
                        $animal['name'], 
                        $animal['species'], 
                        $animal['age']
                    ]
            );
        }
        DB::insert(
            'INSERT INTO animals(name,species,age)Values("Rocky","perro",3)'
        );

        DB::table('animals')->insert([
            ['name'=>'Simba','species'=>'leon','age'=>4],
            ['name'=>'Dumbo','species'=>'elefante','age'=>7],
            ['name'=>'Melman','species'=>'jirafa','age'=>5],
        ]);
    }
}
