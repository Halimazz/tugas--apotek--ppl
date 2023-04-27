<?php

namespace App\Http\Controllers\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User\UserRole;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    private $views      = 'admin/role';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/role';
    
    // Title head
    private $title      = 'Halaman Role';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->userRole         = New UserRole();

    }

    public function index()
    {
        $role = $this->userRole->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Role',
            'role'         => $role,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Role',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        // masuk sini hasil form create

        $dataRole = [
            'nama'          => $request->nama,
        ];
        // echo json_encode($dataRole); die;
        $this->userRole->create($dataRole);

        return redirect("$this->url")->with('sukses', 'Data Role berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
    }

    public function edit($id)
    {
        // Get Data
        $userRole = $this->userRole->where('id', $id)->first();
        // echo json_encode($user); die;
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Users',
            'id'            => $id,
            'userRole'      => $userRole
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
            $dataRole = [
                'nama' => $request->nama,
            ];
            // echo json_encode($dataSiswa); die;
            $this->userRole->where('id', $request->id)->update($dataRole);
            return redirect("$this->url")->with('sukses', 'Data Role berhasil di edit');
    }

    public function destroy($id)
    {
        //
    }
}
