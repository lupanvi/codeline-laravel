<?php

use Illuminate\Database\Seeder;
 


class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        

        factory(App\Genre::class)->create(['name' => 'drama']);
        factory(App\Genre::class)->create(['name' => 'romance']); 
        $genre_action = factory(App\Genre::class)->create(['name' => 'action'])->pluck('id')->toArray();        
        

        factory(App\Film::class, 3)->create()->each(function ($f) use($genre_action) {
	        $f->comments()->save(factory(App\Comment::class)->create([
	        	'film_id' => $f->id
	        ]));

            $f->genres()->attach(
                $genre_action               
            );
           
	    });

       

    }
}
