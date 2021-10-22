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
        $owner = User::factory()->create(['name' => 'Stijn De Leeuw', 'email' => 'sdeleeuw98@gmail.com', 'email_verified_at' => '2020-12-29 17:53:42', 'password' => '$2y$10$ALn.5h.pqG36EQnlLhcGD.ySj.d/Fhf1xepOGJxZfDZO4..hU1OAa', 'profile_photo_path' => 'profile-photos/LJBWolybywqtDo3QcOuExHMKE2zB8k8kO4TZ7C6i.jpg']);
        $owner->syncRoles('owner');
        $vendor = User::factory()->create();
        $vendor->syncRoles('vendor');
        $admin = User::factory()->create();
        $admin->syncRoles('admin');
        User::factory(10)->create();
    }
}
