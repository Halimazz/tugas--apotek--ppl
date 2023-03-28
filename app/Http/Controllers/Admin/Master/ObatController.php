<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Master\Obat;
class ObatController extends Controller
{
    private $views      = 'admin/master/obat';
    private $url      = 'admin/master-obat';
    private $title      = 'Halaman Obat';

    public function __construct()
    {
        // Di isi Construct
        // $this->userRole = New UserRole();
        $this->obat = New Obat();
    }

    public function index(){

        $obat = $this->obat->get();
        $data = [
            'title' => $this->title,
            'url' => $this->url,
            'page' =>"Halaman obat",
            'obat' => $obat
        ];
        return view($this->views.'/index',$data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data obat'
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataObat = [
            'idPegawai'       => session()->get('users_id'),
            'nama'            => $request->nama,
            'harga'           => $request->harga,
            'stok'            => $request->stok,
            'pabrik'          => $request->pabrik,
            'alamat_pabrik'   => $request->alamat_pabrik,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'tanggal_produksi' => $request->tanggal_produksi

        ];
        $this->obat->create($dataObat);

        return redirect("$this->url")->with('sukses', 'obat berhasil di tambahkan');
    }

    public function show($id)
    {
        $obat     = $this->obat->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Daerah',
            'obat'        => $obat
        ];
        return view($this->views . "/show", $data);
    }
    public function edit($id)
    {
        $obat     = $this->obat->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data obat',
            'id'            => $id,
            'obat'        => $obat
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataObat = [
            'nama'          => $request->nama,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            'pabrik'        => $request->pabrik,
            'alamat_pabrik' => $request->alamat_pabrik,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'tanggal_produksi' => $request->tanggal_produksi
            
        ];
        $this->obat->where('id', $id)->update($dataObat);

        return redirect("$this->url")->with('sukses', 'obat berhasil di edit');
    }

    public function destroy($id)
    {
        $obat     = $this->obat->where('id', $id)->first();
        $this->obat->destroy($id);

        return redirect("$this->url")->with('sukses', 'Daerah ' . $obat->nama . ' berhasil di hapus');
    }

}
