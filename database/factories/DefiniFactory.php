<?php

namespace Database\Factories;

use App\Models\Defini;
use Illuminate\Database\Eloquent\Factories\Factory;

class DefiniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Defini::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "lorem ipson dolore",
            'definicon' => "..............",
        ];
    }
}
