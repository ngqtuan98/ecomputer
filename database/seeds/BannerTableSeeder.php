<?php

use App\Banner;
use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'link' => 'img/banner/banner-bg-1.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-white.jpg',
            'flagdel' => '1',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7-1.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7-2.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7-3.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7-4.jpg',
            'flagdel' => '0',
        ]);
        Banner::create([
            'link' => 'img/banner/banner-bg-pw7-5.jpg',
            'flagdel' => '0',
        ]);
    }
}
