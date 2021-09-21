<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\Category;
use Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'slug', 'nama')->get();
        $posts = Post::latest()
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6)
            ->withQueryString();
        return view('fe.artikel.index', compact(
            'posts',
            'categories'
        ));
    }

    public function show(Post $post)
    {
        $url = url()->current();

        $facebook = Share::page($url, $post->judul)
            ->facebook()
            ->getRawLinks();
        $twitter = Share::page($url, $post->judul)
            ->twitter()
            ->getRawLinks();
        $whatsapp = Share::page($url, $post->judul)
            ->whatsapp()
            ->getRawLinks();
        $telegram = Share::page($url, $post->judul)
            ->telegram()
            ->getRawLinks();
        return view('fe.artikel.show', compact(
            'post',
            'facebook',
            'twitter',
            'whatsapp',
            'telegram',
        ));
    }
}
