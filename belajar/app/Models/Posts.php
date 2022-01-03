<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = ['id'];    //id adalah bagian yg gaboleh diisi

    protected $with = ['Category', 'User'];  


    //penggunaan variabel scope untuk pencarian di halaman posts mealalui judul dan tulisan
    public function scopeFilter($query, array $filters) {      
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('tulis', 'like', '%' . $search . '%');
            });
        });

        //penggunaan variabel scope untuk pencarian di halaman posts mealalui slug pada kategori
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('Category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        //penggunaan variabel scope untuk pencarian di halaman posts mealalui id pada user
        $query->when($filters['user'] ?? false, function($query, $user) {
            return $query->whereHas('User', function($query) use ($user) {
                $query->where('id', $user);
            });
        });

        /*if(isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('judul', 'like', '%' . $filters['search'] . '%')   //select * from `query` where `judul` or `tulis` = request
                  ->orWhere('tulis', 'like', '%' . $filters['search'] . '%');
        }*/
    }

    public function Category() {
        return $this->belongsTo(Category::class);   //relasi tabel post ke tabel category. satu postingan memiliki satu kategori
    }

    public function User() {
        return $this->belongsTo(User::class);       //relasi tabel post ke tabel user. satu postingan dimiliki oleh satu user
    }

    /*public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
