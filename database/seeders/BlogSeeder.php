<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demo = Factory::create();

        for($i=0; $i<10; $i++):

            $blogsdata = [

                "slug"          => $demo->slug(),
                "title"         => $demo->realText(30),
                "thumbnail"     => $demo->imageUrl(),
                "excerpt"       => $demo->text(100),
                "content"       => $demo->text(500),
                "user_id"       => $demo->numberBetween(1, 10) ,
                "category_id"   => $demo->numberBetween(1, 10) ,
                "views"         => $demo->numberBetween(50, 5000),
                "user_photo"    => $demo->imageUrl(),
                "created_at"    => Carbon::now()->format('Y-m-d h:i:s'),
                "updated_at"    => Carbon::now()->format('Y-m-d h:i:s')

            ];


            DB::table('blogs')->insert($blogsdata);

        endfor;
    }
}
