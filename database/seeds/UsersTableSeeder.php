<?php

use Illuminate\Database\Seeder;
use Store\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Benja',
          'email' => 'benja@store.com',
          'password' => bcrypt('benja')
        ]);

        User::create([
          'name' => 'retailer',
          'email' => 'retailer@store.com',
          'password' => bcrypt('retailer')
        ]);
    }
}
