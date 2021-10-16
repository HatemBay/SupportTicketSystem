<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Department;
use App\Models\Dept;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'dept_id' => Department::factory(),
            'subject' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['CLIENT REPLIED', 'ANSWERED', 'CLOSED'])
        ];
    }
}
