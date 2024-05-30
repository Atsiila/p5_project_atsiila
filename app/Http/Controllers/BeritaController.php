<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use PDF;
use Storage;

class BeritaController extends Controller
{
    public function viewPDF()
    {
        $berita = Berita::latest()->get();

        $data = [
            'title' => 'Data berita',
            'date' => date('m/d/Y'),
            'berita' => $berita,
        ];

        $pdf = PDF::loadView('berita.export-pdf', $data)
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function index()
    {
        $berita = Berita::latest()->get();
        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        $penulis = Penulis::all();
        $kategori = Kategori::all();
        return view('berita.create', compact('penulis', 'kategori'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'judul' => 'required',
            'isi_berita' => 'required|min:10',
            'tanggal' => 'required',
            'status' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi_berita;
        $berita->tanggal = $request->tanggal;
        $berita->status = $request->status;
        $berita->id_penulis = $request->id_penulis;
        $berita->id_kategori = $request->id_kategori;
        // upload image
        $image = $request->file('image');
        $image->storeAs('public/beritas', $image->hashName());
        $berita->image = $image->hashName();
        $berita->save();
        return redirect()->route('berita.index');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $penulis =  Penulis::all();
        $kategori =  Kategori::all();
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita', 'penulis', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required',
            'isi_berita' => 'required|min:10',
            'tanggal' => 'required',
            'status' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->tanggal = $request->tanggal;
        $berita->isi_berita = $request->isi_berita;
        $berita->status = $request->status;
        $berita->id_penulis = $request->id_penulis;
        //upload image
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->storeAs('public/beritas', $image->hashName());
        //delete old image
        Storage::delete('public/beritas/' . $berita->image);
        $berita->image = $image->hashName();
        }

        $berita->save();
        return redirect()->route('berita.index');
    }


    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        Storage::delete('public/beritas/' . $berita->image);
        $berita->delete();
        return redirect()->route('berita.index');
    }
    public function tampil($id)
    {
        $berita = Berita::findOrFail($id);
        return view('tampilan', compact('berita'));
    }

}
