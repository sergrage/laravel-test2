<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Animal;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 10)->create();
        //factory(Animal::class, 10)->create();
        factory(Article::class, 50)->create();
    }
}
