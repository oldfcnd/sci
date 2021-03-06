<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @see https://laravel.com/docs/8.x/database-testing
 * @see https://github.com/fzaninotto/Faker
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lotacao_id' => null,
            'cargo_id' => null,
            'funcao_id' => null,
            'perfil_id' => null,

            'nome' => random_int(0, 1)
                        ? $this->faker->name()
                        : null,

            'sigla' => $this->faker->unique()->word(),
        ];
    }
}
