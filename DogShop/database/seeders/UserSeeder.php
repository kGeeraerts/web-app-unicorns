<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $owner = User::factory()->create(['name' => 'Stijn De Leeuw', 'email' => 'sdeleeuw98@gmail.com', 'email_verified_at' => '2021-10-09 17:53:42', 'password' => '$2y$10$ALn.5h.pqG36EQnlLhcGD.ySj.d/Fhf1xepOGJxZfDZO4..hU1OAa', 'profile_photo_path' => 'profile-photos/LJBWolybywqtDo3QcOuExHMKE2zB8k8kO4TZ7C6i.jpg']);
        $owner->syncRoles('owner');
        $owner = User::factory()->create(['name' => 'Person14', 'email' => 'silke.vervaecke@student.ehb.be', 'email_verified_at' => '2020-11-15 15:33:53', 'password' => '$2y$10$HEIhdgvlJhsIP8od26Xxd.KClp28NdvV8pgY3vkUPGkP28mInZbIG']);
        $owner->syncRoles('owner');
        $owner = User::factory()->create(['name' => 'Lollydepp', 'email' => 'lore.van.langenhove@icloud.com', 'email_verified_at' => '2020-11-16 13:24:14', 'password' => '$2y$10$UX6lGxc6APxGtKImJj1/SuwQ12V9SBPgIH4qRUL5a0FTe5FEI9w9a']);
        $owner->syncRoles('owner');
        $owner = User::factory()->create(['name' => 'Robbe Poczo', 'email' => 'robbe.poczo@student.ehb.be', 'email_verified_at' => '2021-11-21 19:12:14', 'password' => '$2y$10$NLY9QIM9tRJKh59UzDRmoe4IxiZCgIQoeqd1k1mQ.HdCW0B31Lj3i']);
        $owner->syncRoles('owner');
        $admin = User::factory()->create();
        $admin->syncRoles('admin');
        $vendor = User::factory()->create();
        $vendor->syncRoles('vendor');
        User::factory(2)->create();
    }
}
