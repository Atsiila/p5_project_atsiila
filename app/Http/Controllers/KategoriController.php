<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use PDF;
use Storage;

class KategoriController extends Controller
{
    public function viewPDF()
    {
        $kategori = Kategori::latest()->get();

        $data = [
            'title' => 'Data kategori',
            'date' => date('m/d/Y'),
            'kategori' => $kategori,
        ];

        $pdf = PDF::loadView('kategori.export-pdf', $data)
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function index()
    {
        $kategori = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10',
        ]);

        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:10',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        Storage::delete('public/kategoris/' . $kategori->image);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
