<?php

namespace App\Http\Controllers\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User\UserModel;
use App\Models\User\UserRole;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $views      = 'admin/users';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/users';
    
    // Title head
    private $title      = 'Halaman Users';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mUsers           = new UserModel();
        $this->userRole         = New UserRole();

    }

    public function index()
    {
        $users = $this->mUsers->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Users',
            'users'         => $users,
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
            'page'          => 'Tambah Data Users',
        ];

        return view($this->views . "/create", $data);
    }

    public function store(Request $request)
    {
        // masuk sini hasil form create

        $dataUser = [
            'username'          => $request->username,
            'password'          => Hash::make($request->password),
            'sandi'             => $request->password,
            'status'            => $request->status,
            'idRole'            => $request->idRole,
        ];
        // echo json_encode($dataUser); die;
        $this->mUsers->create($dataUser);

        return redirect("$this->url")->with('sukses', 'Users berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
    }

    public function edit($id)
    {
        // Get Data
        $user = $this->mUsers->where('id', $id)->first();
        $userRole = $this->userRole->get();
        // echo json_encode($user); die;
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Users',
            'id'            => $id,
            'user'          => $user,
            'userRole'      => $userRole
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $validatedData = $request->validate([
            'username'  =>  ['required', 'min:3', 'max:255', 'unique:users'],
        ]);
       
        if ($request->password != $request->verifikasi) {
            return redirect("$this->url/$request->id/edit")->with('gagal', 'Verifikasi password harus sama dengan password');
        } else {
            $dataUser = [
                'username' => $request->username,
                'password'      => Hash::make($request->password),
            ];
            // echo json_encode($dataSiswa); die;
            $this->mUsers->where('id', $request->id)->update($dataUser);
            return redirect("$this->url")->with('sukses', 'Data Users berhasil di edit');
        }
    }

    public function destroy($id)
    {
        //
    }

}
