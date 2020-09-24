<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory(10)->create();
        // \App\Models\User::factory()->count(20)->create(); 
        //    \APP\Models\Company::factory()->count(10)->create();

         //  \App\Models\Company::factory()->count(20)->create(); 
           \App\Models\Jobs::factory()->count(20)->create(); 
        // $categories = [
        //     'Technology',
        //     'Engineering',
        //     'goverment',
        //     'Medical',
        //     'Construction',
        //     'Software'
        // ];
        // foreach ($categories as $category){
        //     Category::create(['name' => $category]);
        // }
    }
}
