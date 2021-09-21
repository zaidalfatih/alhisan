<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('fe.home.home');
    }
    public function tentang()
    {
        return view('fe.home.tentang');
    }
    public function kontak()
    {
        return view('fe.home.kontak');
    }
    public function dakwah()
    {
        return view('fe.home.dakwah');
    }
    public function sosial()
    {
        return view('fe.home.sosial');
    }
    public function wirausaha()
    {
        return view('fe.home.wirausaha');
    }
}
