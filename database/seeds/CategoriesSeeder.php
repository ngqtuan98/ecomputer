<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now()->toDateString();
        Category::insert([
            'name'=>'Asus','slug'=>'asus','created_at'=>$now,'updated_at'=>$now,
            
        ]);
        Category::insert([
            
            'name'=>'HP','slug'=>'hp','created_at'=>$now,'updated_at'=>$now,
            
        ]);
        Category::insert([
           
            'name'=>'Dell','slug'=>'dell','created_at'=>$now,'updated_at'=>$now,
        ]);
    }
}
