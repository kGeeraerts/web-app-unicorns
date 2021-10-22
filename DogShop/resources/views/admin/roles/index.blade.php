<p>$customer = Role::create(['name' => 'customer']);//shopping cart</p>
<p>$customer->givePermissionTo('edit articles');</p>

<p>$vendor = Role::create(['name' => 'vendor']);//dogs and products</p>
<p>$vendor->givePermissionTo('articles');</p>

<p>$editor = Role::create(['name' => 'editor']);//news article</p>
<p>$editor->givePermissionTo('articles');</p>

<p>$moderator = Role::create(['name' => 'moderator']);//forum +faq</p>
<p>$moderator->givePermissionTo('articles');</p>

<p>$admin = Role::create(['name' => 'admin']);//admin stuff</p>
<p>$admin->givePermissionTo('under-construction');</p>
