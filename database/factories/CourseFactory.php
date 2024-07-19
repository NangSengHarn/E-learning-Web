<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'name'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->sentence(),
            'price'=>$this->faker->randomNumber(6)
        ];
    }
}
