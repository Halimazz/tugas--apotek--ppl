<?php

namespace App\Http\Controllers\Apoteker\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Master\Dosis;
class DosisController extends Controller
{
    private $views      = 'apoteker/master/dosis';
    private $url      = 'apoteker/master-dosis';
    private $title      = 'Halaman Dosis';

    public function __construct()
    {
        // Di isi Construct
        // $this->userRole = New UserRole();
        $this->dosis = New Dosis();
    }

    public function index(){

        $dosis = $this->dosis->get();
        $data = [
            'title' => $this->title,
            'url' => $this->url,
            'page' =>"Halaman Dosis",
            'dosis' => $dosis
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
        $dataDosis = [
            'idPegawai'       => session()->get('users_id'),
            'nama'            => $request->nama
        ];
        $this->dosis->create($dataDosis);

        return redirect("$this->url")->with('sukses', 'Dosis berhasil di tambahkan');
    }

    public function show($id)
    {
        $dosis     = $this->dosis->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Daerah',
            'dosis'        => $dosis
        ];
        return view($this->views . "/show", $data);
    }
    public function edit($id)
    {
        $dosis     = $this->dosis->where('id', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Dosis',
            'id'            => $id,
            'dosis'        => $dosis
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {   
        $dataDosis = [
            'nama'          => $request->nama,
        ];
        $this->dosis->where('id', $id)->update($dataDosis);

        return redirect("$this->url")->with('sukses', 'Dosis berhasil di edit');
    }

    public function destroy($id)
    {
        $dosis     = $this->dosis->where('id', $id)->first();
        $this->dosis->destroy($id);

        return redirect("$this->url")->with('sukses', 'Daerah ' . $dosis->nama . ' berhasil di hapus');
    }


}
