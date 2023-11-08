<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Tambahkan baris ini untuk mengimpor model Berita

class BeritaController extends Controller
{
    public function showBeritaForm()
    {
        return view('berita.form');
    }

    public function postBerita(Request $request)
    {
        // Validasi data yang dikirimkan melalui formulir
        if ($request->validate([
            'judul' => 'required',
            'konten' => 'required'
        ])) {

            // Simpan data berita ke dalam tabel
            $berita = new Berita;
            $berita->judul = $request->judul;
            $berita->konten = $request->konten;
            $berita->save();
            // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
            if ($berita) {
                return redirect('/berita/form')->with('success', 'benar');
            } else {
                return back()->with('failed', 'gagal');
            }
        }
    }


    public function edit($id){
        $berita   = Berita::whereId($id)->first();
        return view('berita.edit')->with('berita', $berita);
    }

    public function formBeritaAdmin()
    {
        return view('berita.berita-admin');
    }   
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);
    
        $berita = Berita::findOrFail($id);
        $berita->judul = $request->input('judul');
        $berita->konten = $request->input('konten');
        $berita->save();
    
        return redirect()->route('berita.berita-admin')->with('success', 'Berita berhasil diperbarui');
    }
    
}
