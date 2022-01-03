<?php

namespace Database\Factories;

use App\Models\Posts;   //menggunakan tabel posts
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Membuat isi database dengan menggunakan factory dan metod faker. sehingga data dummy bisa terbentuk
        return [
            'judul' => $this->faker->sentence(mt_rand(5,10)),
            'excerpt' => $this->faker->sentence(mt_rand(10,15)),
            'tulis' => $this->faker->paragraph(mt_rand(10,15)),
            'category_id' => mt_rand(1,5),
            'user_id' => mt_rand(1,5)
        ];
    }
}
