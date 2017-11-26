<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\User::class, 10)->create();
        $film = factory(\App\Film::class, 20)->create();
        $commet = factory(\App\Comment::class, 10)->create();
    }
}
