<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        $user->save();

        if ($user) {
            return back()->with('success', 'Admin baru berhasil ditambah!');
        } else {
            return back()->with('failed', 'Gagal menambah admin baru!');
        }
    }

    public function editAdmin($id)
    {
        $data = User::find($id);
        return view('admin.edit', compact('data'));
    }

    public function postEditAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns', 
            'jenisKelamin' => 'required', 
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;

        $user->save();

        if ($user) {
            return back()->with('success', 'Data admin berhasil diupdate!');
        } else {
            return back()->with('failed', 'Gagal mengupdate data admin!');
        }
    }

    public function deleteAdmin($id)
    {
        $data = User::find($id);

        $data->delete();

        if ($data) {
            return back()->with('success', 'Data berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data!');
        }
    }

    

public function adminBuku(Request $request)
{
    $search = $request->input('search');
    $data = Buku::where('judul_buku', 'LIKE', '%' . $search . '%')->paginate(5);
    return view('admin.buku', compact('data'));
}

    public function tambahBuku()
    {
        return view('admin.tambahBuku');
    }

    public function postTambahBuku(Request $request)
    {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'required|image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $buku = new Buku;
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/', $filename);
            $buku->gambar = $filename;
        }

        $buku->save();

        if ($buku) {
            return back()->with('success', 'Buku baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function editBuku($id)
    {
        $data = Buku::find($id);
        $kategori = ["Programmer", "Sains", "Komik"];
        // return view('admin.editBuku', compact('data'));
        return view('admin.editBuku', ['data' => $data, 'kategori' => $kategori]);
    }

    public function postEditBuku(Request $request, $id)
    {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $buku = Buku::find($id);
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori;

        if ($request->hasFile('gambar')) {
            $filepath = 'images/' . $buku->gambar;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }

            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images/', $filename);
            $buku->gambar = $filename;
        }

        $buku->save();

        if ($buku) {
            return back()->with('success', 'Buku berhasil diupdate!');
        } else {
            return back()->with('failed', 'Buku gagal diupdate!');
        }
    }

    public function deleteBuku($id)
    {
        $buku = Buku::find($id);
        $filepath = 'images/' . $buku->gambar;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $buku->delete();

        if ($buku) {
            return back()->with('success', 'Data buku berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data buku!');
        }
    }

}
