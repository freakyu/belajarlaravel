<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Posts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Diah Paramitha',
            'email' => 'diahparamitha01@gmail.com',
            'password' => bcrypt('12345')
        ]);

       /* User::create([
            'name' => 'Dimas Jaya Putra',
            'email' => 'dimasjayaputra01@gmail.com',
            'password' => bcrypt('54321')
        ]);*/

        User::factory(5)->create(); //membuat 5 user secara acak

        Category::create([
            'name' => 'NEWS',
            'slug' => 'news'
        ]);

        Category::create([
            'name' => 'CITY',
            'slug' => 'city'
        ]);

        Category::create([
            'name' => 'ISLAND',
            'slug' => 'island'
        ]);

        Category::create([
            'name' => 'TRAVEL',
            'slug' => 'travel'
        ]);

        Category::create([
            'name' => 'PHOTO',
            'slug' => 'photo'
        ]);


        Posts::factory(30)->create();   //membuat 30 postingan secara acak. berhubungan dengan postfactory

        /*Posts::create([
            'judul' => 'Burger',
            'category_id' => '2',
            'user_id' => '2',
            'tulis' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo'
        ]);

         Posts::create([
            'judul' => 'Lemon tea',
            'category_id' => '3',
            'user_id' => '1',
            'tulis' => ' consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);

         Posts::create([
            'judul' => 'ENHYPEN ',
            'category_id' => '1',
            'user_id' => '2',
            'tulis' => ' consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]);*/



    }
}
