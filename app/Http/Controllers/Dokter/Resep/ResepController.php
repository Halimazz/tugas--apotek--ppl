<?php

namespace App\Http\Controllers\Dokter\Resep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Admin\Master\Resep;
use App\Models\Admin\Master\Obat;
use App\Models\Admin\Master\Dosis;
use App\Models\Admin\Master\Waktu;


class ResepController extends Controller
{
   
    private $views      = 'dokter/resep';
    private $url        = 'dokter/resep';
    private $title      = 'Halaman Dashboard';


    public function __construct()
    {
       $this->dosis= new Dosis();
         $this->waktu= new Waktu();
        $this->obat= new Obat();
        $this->resep= new Resep();
    }

    public function index()
    {
        $resep = $this->resep->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Halaman Pengajuan Resep',
            'resep'         => $resep,
            'idMDokter'       =>session()->get('users_id')
        ];
        
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        //
    }

    public function destroy($id)
    {
        //
    }
}
