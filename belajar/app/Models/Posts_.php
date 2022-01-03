<?php

namespace App\Models;

/*use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
*/
class Posts /*extends Model*/
{
   private static $blog_post = [
        [
            "judul" => "Lorem Ipsum",
            "artikel" => "Lorem-Ipsum",
            "penulis" => "Diah",
            "tulis" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        ],

         [
            "judul" => "Ipsum mal",
            "artikel" => "Ipsum-mal",
            "penulis" => "Dimas",
            "tulis" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        ]
    ];


    public static function all()
    {
        return collect(self::$blog_post); //kalau properti biasa pakai self. klo object oriented pake $this->.  sudah berupa collection.
    }

    public static function find($artikel)
    {
        $posts = static::all();     //Mengambil collection yang ada di array blog_post

        // Jadi nanti si foreach ini mencari judul artikel (blog_post) yang sesuai dengan yang diklik user kemudian kalau dapat disimpan ke dalam array baru yang dinamakan post.
        $post = [];
       /* foreach ($posts as $pos) {
             if ($pos["artikel"] === $artikel) {
                $post = $pos;
            }
        }*/

        return $posts->firstWhere('artikel', $artikel);     //Menggunakan collection dengan fungsi firstwhere dimana jika sesuai dengan artikel, maka dia akan mencari isi artikel tsb.
    }
}
