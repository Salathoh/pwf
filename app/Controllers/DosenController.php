<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDosen;

class DosenController extends Controller
{
    public function showDosenForm()
    {
        return view('dosen.form');
    }

    public function postDosen(Request $request)
    {
        // Validasi data yang dikirimkan melalui formulir
        if ($request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'mata_kuliah' => 'required',
            'email' => 'required'
        ])) {

            // Simpan data berita ke dalam tabel
            $data_dosen = new DataDosen;
            $data_dosen->nama = $request->nama;
            $data_dosen->nip = $request->nip;
            $data_dosen->mata_kuliah = $request->mata_kuliah;
            $data_dosen->email = $request->email;
            $data_dosen->save();
            // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
            if ($data_dosen) {
                return redirect('/dosen/form')->with('success', 'benar');
            } else {
                return back()->with('failed', 'gagal');
            }
        }
    }
}
