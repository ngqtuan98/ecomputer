<?php

use App\Slide;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 30; $i++) {
            Slide::create([
                'title' => 'Laptop New <br>Collection! '. $i ,
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'banner' => 'img\/banner\/banner-img-' . [1,2,3,4][array_rand([1,2,3,4])] .'.png',
                'link' => 'shop',
            ]);
        }
    }
}
