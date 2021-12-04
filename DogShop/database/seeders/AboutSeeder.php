<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('about')->insert([
            'section1' => 'The DogShop is a non-profit organisation with as goal to end the suffering of street dogs worldwide. We\'re engaging ourselves to decrease the amount of stray dogs by 60% by 2030. This through projects of education and adoption to save the lives of the wonderful animals.',
            'section2' => 'We believe that every dog has the same rights and responsibilities as everyone else in the world. We promote compassion, empathy and cooperation. We aim to make the world a better, happier and friendlier place. With your help we can save the lives of dogs in need.',
            'section3' => 'DogShop was started by Octaaf aan de Bolle in 2020 when he went to feed Fiffi. That evening Fiffi came back with some friends from the street. Wanting to help them Octaaf let them into his home and gave them food and shelter. Realizing he couldn\'t keep them all he started to look for a good home with friends and family. Soon this commitment became an organization continuing the good work Fiffi started.',
        ]);
    }
}
