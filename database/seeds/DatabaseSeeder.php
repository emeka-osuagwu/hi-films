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
        $this->call(FilmSeeder::class);
    	$this->call(CommentSeeder::class);
    	factory(App\Models\Genre::class, 10)->create();
    	factory(App\Models\FilmGenre::class, 5)->create();
    }
}
