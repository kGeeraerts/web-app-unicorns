<?php

namespace Database\Seeders;

use App\Models\Message;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Message::factory(5)->create(
            ['replied' => '0', 'answer' => null],
        );
        Message::factory(5)->create(
            ['replied' => '1', 'answered_by' => '1', 'updated_at' => DateTime::dateTimeBetween('+10 minutes', '+1 hour')]
        );
    }
}
