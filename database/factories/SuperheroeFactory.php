<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuperheroeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'personaje'=> $this->faker->name(),
            'nombre'=> $this->faker->name(),
            'estado'=> $this->faker->randomElement(['Villano','Heroe']),
            'poder'=> $this->faker->randomElement(['Volar','Control de materia','Rayos laser','Invisibilidad', 'Super Fuerza']),
            'editorial'=> $this->faker->randomElement(['MARVEL comics','DC comics']),
            'raza'=> $this->faker->randomElement(['humano','mutante','metahumano','celestial', 'desconocido']),
            'genero'=> $this->faker->randomElement(['hombre','mujer']),
        ];
    }
}
