<?php

namespace Database\Factories;

use App\Models\Translation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();
        $translation = Translation::get()->count();
        return [
            'table'=> $name,
            'row'=>$this->faker->numberBetween(1, 50),
            'column'=>$this->faker->sentence(),
            'value'=>$this->faker->sentence()
        ];
    }
}
