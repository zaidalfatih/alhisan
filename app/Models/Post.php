<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $with = [
        'category',
        'author'
    ];

    protected $fillable = [
        'category_id',
        'user_id',
        'judul',
        'slug',
        'body',
        'gambar',
        'dilihat',
        'status',
        'excerpt'
    ];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        })
            ->when($filters['category'] ?? false, function ($query, $category) {
                return $query->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })
            ->when($filters['author'] ?? false, function ($query, $author) {
                return $query->whereHas('author', function ($query) use ($author) {
                    $query->where('username', $author);
                });
            });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getGambar()
    {
        return $this->gambar ? asset('storage/'.$this->gambar) : asset('/images/default.png');
    }
}