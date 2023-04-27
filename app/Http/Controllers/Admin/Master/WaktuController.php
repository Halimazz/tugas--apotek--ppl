<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Master\Waktu;
class WaktuController extends Controller
{
    private $views      = 'admin/master/waktu';
    private $url      = 'admin/master-waktu';
    private $title      = 'Halaman Waktu';

    public function __construct()
    {
        // Di isi Construct
        // $this->userRole = New UserRole();
        $this->waktu = New Waktu();
    }

    public function index(){

        $waktu = $this->waktu->get();
        $data = [
            'title' => $this->title,
            'url' => $this->url,
            'page' =>"Halaman Waktu",
            'waktu' => $waktu
        ];
        return view($this->views.'/index',$data);
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Dosis',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        $dataWaktu = [
            'idPegawai'       => session()->get('users_id'),
            'nama'            => $request->nama
        ];
        $this->waktu->create($dataWaktu);

        return redirect("$this->url")->with('sukses', 'Dosis berhasil di tambahkan');
    }

    public function show($id)
    {
        $waktu     = $this->waktu->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Daerah',
            'waktu'        => $waktu
        ];
        return view($this->views . "/show", $data);
    }
    public function edit($id)
    {
        $waktu     = $this->waktu->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Dosis',
            'id'            => $id,
            'waktu'        => $waktu
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataWaktu = [
            'nama'          => $request->nama,
        ];
        $this->waktu->where('id', $id)->update($dataWaktu);

        return redirect("$this->url")->with('sukses', 'Dosis berhasil di edit');
    }

    public function destroy($id)
    {
        $waktu     = $this->waktu->where('id', $id)->first();
        $this->waktu->destroy($id);

        return redirect("$this->url")->with('sukses', 'Waktu ' . $waktu->nama . ' berhasil di hapus');
    }


}
