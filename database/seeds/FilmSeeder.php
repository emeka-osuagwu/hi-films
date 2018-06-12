<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\Film;
use Faker\Generator as Faker;

class FilmSeeder extends Seeder
{

	public $faker;

	public function __construct(Faker $faker)
	{
		$this->faker = $faker;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Film::create([
    		'name' => $this->faker->name,
    		'description' => $this->faker->text,
    		'realease_date' => Carbon::now(),
    		'photo' => $this->faker->imageUrl($width = 640, $height = 480),
    		'video_url' => "https://www.youtube.com/watch?v=fLeJJPxua3E",
    		'rating' => rand(1, 5),
    		'ticket_price' => rand(1, 5) . rand(1, 100) . rand(1, 100) . rand(1, 1300),
    		'country' => $this->faker->country,
    		'genre' => $this->faker->name,
    		'slug' => $this->faker->name
    	]);
    }
}
