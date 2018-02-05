<?php

use Illuminate\Database\Seeder;
use App\Activity;
use App\Mosque;
use Illuminate\Support\Facades\DB;

class addActivitySeeder extends Seeder
{

    public function run()
    {

       $faker = \Faker\Factory::create();

       for ($i=0 ; $i< 20 ; $i++) {
           Activity::create([
               'title' => $faker->name() ,
               'mosque_id' => $faker->randomElement(Mosque::pluck('id')->toArray()) ,
               'content' => $faker->sentence()
           ]);
       }
    }
}
