<?php

namespace Database\Factories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agent;
use App\Models\Ticket;
use App\Models\Admin;
use App\Models\User;

class PriorityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Priority::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'ticket_id' => Ticket::factory(),
            'subject' => $this->faker->paragraph(),
            'state' => $this->faker->word()
        ];
    }
}
