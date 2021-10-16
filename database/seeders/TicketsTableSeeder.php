<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = \App\Models\Ticket::factory()->create([
            'subject' => 'sdsss',
            'state' => 'sssqs',
            // factory default password is 'password'
        ]);
    }
}
