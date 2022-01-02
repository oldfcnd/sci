<?php

namespace Database\Factories;

use App\Models\LogFuncionamento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @link https://laravel.com/docs/8.x/database-testing
 * @link https://github.com/fzaninotto/Faker
 */
class LogFuncionamentoFactory extends Factory
{
    protected $model = LogFuncionamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),

            'ult_import_impressao' => random_int(0 ,1)
                                        ? $this
                                            ->faker
                                            ->dateTimeBetween()
                                            ->format('Y-m-d')
                                        : null,

            'ult_import_corporativo' => random_int(0 ,1)
                                        ? $this
                                            ->faker
                                            ->dateTimeBetween()
                                            ->format('Y-m-d')
                                        : null,
        ];
    }
}

