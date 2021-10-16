<?php

namespace Database\Factories;

use App\Models\KnowledgeBase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\User;

class KnowledgeBaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KnowledgeBase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'status' => $this->faker->word(),
            'description' => $this->faker->paragraph()
        ];
    }
}
