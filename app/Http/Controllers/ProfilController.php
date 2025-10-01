<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view ('beranda');
    }
    public function profil()
    {
        $data = [
            'nama' => 'Galih Priadiwangsa Pratama',
            'kelas' => 'XI PPLG 1',
            'sekolah' => 'semekroos'
        ];
    	return view('profil', $data, [
            'title' => 'Profile'
        ]);
    }

    public function kontak()
    {
   		return view('kontak', [
            'title' => 'Contact'
        ]);
    }

}
