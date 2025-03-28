<?php

namespace Database\Factories;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConfigurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Configuration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facebook' => "https://www.facebook.com/ine.gov.ao",
            'linkedin' => "https://www.linkedin.com/in/ine-angola-3a559216b/",
            'instagram' => "https://www.instagram.com/ine_angola",
            'email' => "Aqui vai o email",
            'address' => "Aqui vai o endereço do INE",
            'telefone' => "Aqui vai os telefones separados por uma barra(/)"
        ];
    }
}
