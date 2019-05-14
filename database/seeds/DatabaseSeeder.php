<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\Contact::class, 20)->create();

        DB::table('users')->insert([
            'name' => 'Thanh Giong',
            'email' => 'giongbt@gmail.com',
            'password' => '123123123'
        ]);
    }
}
