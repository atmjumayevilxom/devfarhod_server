<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     *
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();
        $tagCount = Tag::get()->count();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => ($tagCount > 1) ? rand(1, $tagCount) : null,
        ];
    }
}
