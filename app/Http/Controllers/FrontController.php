<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Berita;

class FrontController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $berita = Berita::latest()->get();
        return view('welcome', compact('berita', 'penulis','kategori'));
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $berita = Berita::latest()->get();
        return view('berita', compact('berita', 'penulis','kategori'));
    }

    public function berita()
    {
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $berita = berita::latest()->get();
        return view('berita', compact('berita', 'penulis','kategori'));
    }

    public function about()
    {
        return view('about');
    }

    public function detailBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('detail_berita', compact('berita'));
    }

    public function filterByPenulis($id)
    {
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $berita = Berita::where('id_penulis', $id)->latest()->get();
        return view('berita', compact('berita', 'penulis','kategori'));
    }
}
