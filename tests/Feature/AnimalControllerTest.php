<?php

it('assigns unique sequential integer ids even when the counter is stale', function () {
    $animals = [
        1 => ['name' => 'Perro', 'species' => 'Canino'],
        2 => ['name' => 'Gato', 'species' => 'Felino'],
        3 => ['name' => 'Nemo', 'species' => 'Pez'],
    ];

    $this->withSession([
        'animals' => $animals,
        'animals_next_id' => 2,
    ])->post(route('animals.store'), [
        'name' => 'Loro',
        'species' => 'Ave',
        'edad' => 5,
    ])
        ->assertRedirect('/animals')
        ->assertSessionHas('animals.4', ['name' => 'Loro', 'species' => 'Ave', 'edad' => 5])
        ->assertSessionHas('animals_next_id', 5);
});

it('does not reuse an animal id after that animal is deleted', function () {
    $animals = [
        1 => ['name' => 'Perro', 'species' => 'Canino'],
        2 => ['name' => 'Gato', 'species' => 'Felino'],
        3 => ['name' => 'Nemo', 'species' => 'Pez'],
    ];

    $this->withSession([
        'animals' => $animals,
        'animals_next_id' => 4,
    ])->post(route('animals.store'), [
        'name' => 'Loro',
        'species' => 'Ave',
        'edad' => 5,
    ]);

    $this->delete(route('animals.destroy', 4))
        ->assertRedirect(route('animals.index'));

    $this->post(route('animals.store'), [
        'name' => 'Conejo',
        'species' => 'Mamífero',
        'edad' => 2,
    ])
        ->assertSessionHas('animals.5', ['name' => 'Conejo', 'species' => 'Mamífero', 'edad' => 2])
        ->assertSessionHas('animals_next_id', 6);
});

it('updates an animal age', function () {
    $this->withSession([
        'animals' => [
            1 => ['name' => 'Perro', 'species' => 'Canino'],
        ],
    ])->put(route('animals.update', 1), [
        'name' => 'Perro',
        'species' => 'Canino',
        'edad' => '7',
    ])
        ->assertRedirect(route('animals.index'))
        ->assertSessionHas('animals.1', [
            'name' => 'Perro',
            'species' => 'Canino',
            'edad' => 7,
        ]);
});