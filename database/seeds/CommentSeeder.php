<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use App\Models\Comment;
use Faker\Generator as Faker;

class CommentSeeder extends Seeder
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
        Comment::create([
            'name' => $this->faker->name,
            'film_id' => 1,
            'comment' => $this->faker->text,
        ]);

        Comment::create([
            'name' => $this->faker->name,
            'film_id' => 2,
            'comment' => $this->faker->text,
        ]);

    	Comment::create([
    		'name' => $this->faker->name,
            'film_id' => 3,
    		'comment' => $this->faker->text,
    	]);
    }
}
