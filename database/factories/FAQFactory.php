<?php

namespace Database\Factories;

use App\Models\FAQ;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\FAQCategory;
use App\Models\User;

class FAQFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FAQ::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'f_a_q_category_id' => FAQCategory::factory(),
            'question' => $this->faker->sentence(),
            'status' => $this->faker->word(),
            'description' => $this->faker->paragraph()
        ];
    }
}
