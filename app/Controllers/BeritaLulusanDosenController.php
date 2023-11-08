<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaLulusanDosenController extends Controller
{
    
    public function beranda() {
        return view('home');
    }
    
    public function berita() {
        return view('ftr.berita');
    }

    public function lulusan() {
        return view('ftr.lulusan');
    }

    public function dosen() {
        return view('ftr.dosen');
    }

    

    
}

    