<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 $factory=Factory::create();
        foreach(range(1,200) as $index){

        	Category::create([

                 'name'=>$factory->name,
                 'status'=>1


        	]);
        }
    }
}
