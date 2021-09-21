<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {

            $status = $request->status;
            if (!empty($status)) {
                $data = Post::where('status', $status)->latest()->get();
            } else {
                $data = Post::latest()->get();
            }
            return datatables()->of($data)
                ->addColumn('penulis', function ($data) {
                    return $data->author->name;
                })
                ->addColumn('tanggal', function ($data) {
                    return $data->created_at->format('d F Y');
                })
                ->addColumn('aksi', function ($data) {
                    return view('admin.artikel._aksi', [
                        'data' => $data,
                        'edit' => route('post.edit', $data->id),
                        'show' => route('post.show', $data->id),
                        'delete' => route('post.destroy', $data->id),
                    ]);
                })
                ->rawColumns(['penulis', 'tanggal', 'aksi'])
                ->addIndexColumn()
                ->make(true);
        }
        $title = 'Artikel';
        $status = Post::withOut(['category', 'author'])->select('id', 'status')->get();
        return view('admin.artikel.index', compact(
            'status',
            'title'
        ));
    }
    public function create()
    {
        $title = 'Buat Artikel';
        $home = route('post.index');
        $categories = Category::select('id', 'nama')->get();
        return view('admin.artikel.create', compact(
            'title',
            'categories',
            'home',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $slug_request = Str::slug($request->judul);
        $posts = Post::where('slug', '=', $slug_request)->first();
        if ($posts) {
            $slug = Str::slug($request->judul . Str::random(3));
        } else {
            $slug = $slug_request;
        }

        $data = new Post();
        $data->judul = Str::title($request->judul);
        $data->slug = $slug;
        $data->category_id = $request->category_id;
        $data->body = $request->body;
        $data->excerpt = Str::limit(strip_tags($request->body), 50);
        $data->user_id = auth()->user()->id;
        $data->dilihat = 0;
        $data->status = 'pending';
        if ($request->file('gambar')) {
            $request->validate([
                'gambar' => 'file|image|mimes:png,jpg,jpeg,svg|max:2048'
            ]);
            $gambar = $request->file('gambar');
            $upload = $gambar->store('artikel/');
            $data->gambar = $upload;
        }

        $data->save();

        return response()->json([
            'data' => $data,
            'message' => 'Artikel berhasil dibuat!',
        ], 201);
    }
}