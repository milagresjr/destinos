<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => 'Milagres Marques',
            'email' => 'milagres@gmail.com',
            'telefone' => '941608052',
            'senha' => bcrypt('facebook')
        ];
    }
}
