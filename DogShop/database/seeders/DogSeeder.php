<?php

namespace Database\Seeders;

use App\Models\Dog;
use Illuminate\Database\Seeder;

class DogSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Dog::factory()->create(['name' => 'Bessie', 'description' => 'Bess is a young mum who\'s fallen on hard times but her gentle, nurturing soul still shines through. Ideal for a family with older children, she\'d be the perfect companion for a family who wants a quiet, friendly pet with good house manners.', 'image' => 'dog-images/dog1.jpg']);
        Dog::factory()->create(['name' => 'Daisy', 'description' => 'Daisy is a quiet, thoughtful a girl who, once she gets to know you, will smooch and happily show you her tricks. She is looking for a caring and compassionate home that will help build her confidence and understand she is a bit shy when meeting new people.', 'image' => 'dog-images/dog2.jpg']);
        Dog::factory()->create(['name' => 'Hanny', 'description' => 'Hanny is very loyal and will want to spend time with his family.', 'image' => 'dog-images/dog3.jpg']);
        Dog::factory()->create(['name' => 'Pomeranian', 'description' => 'Beware of your couch cause this little boy will try to chew it. But with a couple of chew toys all your possessions are safe', 'image' => 'dog-images/dog6.jpg']);
        Dog::factory()->create(['name' => 'Tony', 'description' => 'Tony is a Golden Retriever who needs a home where they can run around a lot. They are very friendly towards kids.', 'image' => 'dog-images/dog4.jpg']);
        Dog::factory()->create(['name' => 'Whippet - Tanya', 'description' => 'Small dog, big personality. She knows all her basic tricks. She looks for a home where she can go on a lot of walks.', 'image' => 'dog-images/dog5.jpg']);
        Dog::factory()->create(['name' => 'Yorkshire', 'description' => 'I\'m only small so I find small children a bit intimidating - older families only please.', 'image' => 'dog-images/dog7.jpg']);
        Dog::factory()->create(['name' => 'Doloros', 'description' => 'Doloros loves cookies, attention and cats. Great dog for in an apartment.', 'image' => 'dog-images/dog8.jpg']);
        Dog::factory()->create(['name' => 'Larry', 'description' => 'Larry loves a run, so if you’re looking for a jogging companion, then Larry’s your man. He does need a secure yard with high fences.', 'image' => 'dog-images/dog9.jpg']);
        Dog::factory()->create(['name' => 'Sarge', 'description' => 'Sarge is an active and incredibly smart boy who likes nothing more than to stretch his legs at the beach or the park. He\'d suit an active person who wants an outgoing and friendly companion.', 'image' => 'dog-images/dog10.jpg']);
    }
}
