<?php

namespace App\Http\Controllers\Kasir\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Admin\Master\Resep;
use App\Models\Admin\Master\Obat;
use App\Models\Admin\Master\Dosis;
use App\Models\Admin\Master\Waktu;


class ResepController extends Controller
{
   
    private $views      = 'kasir/master/resep';
    private $url        = 'kasir/master-resep';
    private $title      = 'Halaman Validasi Resep';


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
            'idMKasir'       =>session()->get('users_id')
        ];
        return view($this->views . "/index", $data);
    }

    public function create()
    {
        $dosis = $this->dosis->get();
        $waktu = $this->waktu->get();
        $obat = $this->obat->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Input Resep Obat',
            'dosis'         => $dosis,
            'waktu'         => $waktu,
            'obat'          => $obat
        ];
        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
       $dataResep =[
       
        'idMObat'       =>$request->idMObat,
        'idMDosis'      =>$request->idMDosis,
        'idMWaktu'      =>$request->idMWaktu,
        'idMKasir'     =>session()->get('users_id'),
        'nama_pasien'   =>$request->nama_pasien,
        'no_telp'       =>$request->no_telp,
        'status'        =>$request->status

       ];
       $this->resep->create($dataResep);

       return redirect("$this->url")->with('sukses', 'Resep berhasil di tambahkan');
    }

    public function show($id)
    {
        $resep = $this->resep->where('id', $id)->first();
    
        // Hitung jumlah
        $resep->jumlah = $resep->obat->harga * $resep->qty;
        
        // Menghitung total
        $total = $resep->jumlah;
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Pengajuan',
            'resep'         => $resep,
            'total'         => $total
        ];
        return view($this->views . "/show", $data);
    }

    public function  validasi(Request $request, $id)
    {
       $dataResep =[
        'status'        => '2',
        'idMKasir'   => session()->get('users_id'),
       ];
       $this->resep->where('id', $id)->update($dataResep);

       return redirect("$this->url")->with('sukses', 'Resep berhasil di validasi');
    }

    public function edit($id)
    {
       $resep      = $this->resep->where('id', $id)->first();
        $obat = Obat::all();
         $dosis = Dosis::all();
        $waktu = Waktu::all();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Resep Obat',
            'id'            => $id,
            'resep'     => $resep,
            'obat'      => $obat,
            'dosis'     => $dosis,
            'waktu'     => $waktu,
            

            
        ];
        return view($this->views . "/edit", $data);   
    }

    public function update(Request $request, $id)
    {   
        $dataResep =[
       
            'idMObat'       =>$request->idMObat,
            'idMDosis'      =>$request->idMDosis,
            'idMWaktu'      =>$request->idMWaktu,
            'idMKasir'     =>session()->get('users_id'),
            'nama_pasien'   =>$request->nama_pasien,
            'no_telp'       =>$request->no_telp,
            'status'        =>$request->status
    
           ];
           $this->resep->where('id', $id)->update($dataResep);

           return redirect("$this->url")->with('sukses', 'resep berhasil di edit');
    }

    public function destroy($id)
    {
        //
    }
}
