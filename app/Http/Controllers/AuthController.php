<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Library
use DB;
use Illuminate\Support\Facades\Hash;

// Model
use App\Models\Admin\User\UserModel;
use App\Models\Admin\User\UserRole;

class AuthController extends Controller
{   
    private $views      = 'auth';
    private $url        = '';
    private $title      = 'Halaman Login';

    public function __construct()
    {
        $this->mUser     = new UserModel();
        $this->userRole         = New UserRole();

    }
    //LOGIN
    public function login(){
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
        ];
        // View
        return view($this->views . "/index", $data);
    }

    //proses
    public function loginProses(Request $request)
    {
        // Validate
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // Get Data
        $users = $this->mUser->where('username', $request->username)->first();
        
        // Check User
        if ($users == null) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Ditemukan');
        }
        
        // Check User Status
        if ($users->status == 0) {
            return redirect()->back()->with('gagal', 'Pengguna Tidak Aktif');
        }
        // Check User Password
        if (Hash::check($request->password, $users->password) == false) {
            return redirect()->back()->with('gagal', 'Kata Sandi Salah');
        }
        // Table user and Update Last Login
        $dataUser = [
            'last_login' => date('Y-m-d H:i:s'),
        ];
        $this->mUser->where('id', $users->id)->update($dataUser);
        // echo json_encode($users); die;
        // Create Session

        if($users->idRole == 1){
            $session = [
                'users_id'  => $users->id,
                'username'  => $users->username,
                'nama'      => $users->nama,
                'role'      => $users->idRole,
                'isLogin'   => true,
            ];

            session($session);
            // echo json_encode($session); die;
            return redirect('admin/home')->with('sukses', 'Berhasil Login');
        }
        else if($users->idRole == 2){
            $session = [
                'users_id'   => $users->id,
                'username'   => $users->username,
                'nama'       => $users->nama,
                'role'       => $users->idRole,
                'isLogin'    => true,
            ];

            session($session);
            // echo json_encode($session); die;
            return redirect('dokter/home')->with('sukses', 'Berhasil Login');
        }
        else if($users->idRole == 3){
            $session = [
                'users_id'   => $users->id,
                'username'   => $users->username,
                'nama'       => $users->nama,
                'role'       => $users->idRole,
                'isLogin'    => true,
            ];

            session($session);
            // echo json_encode($session); die;
            return redirect('apoteker/home')->with('sukses', 'Berhasil Login');
        }
        else if($users->idRole == 4){
            $session = [
                'users_id'   => $users->id,
                'username'   => $users->username,
                'nama'       => $users->nama,
                'role'       => $users->idRole,
                'isLogin'    => true,
            ];

            session($session);
            // echo json_encode($session); die;
            return redirect('kasir/home')->with('sukses', 'Berhasil Login');
        }
        // Response
    }
    
    // //REGISTER
    public function register(){
        // $userRole = $this->userRole->get();

        // $data = [
        //     'title'         => 'Halaman Register',
        //     'url'           => $this->url,
        //     'page'          => 'Halaman Register',
        //     'userRole'      => $userRole
        // ];
        // // View
        // return view($this->views . "/create", $data);
    }

    //proses
    public function registerProses(Request $request){

        //validasi
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        // $dataUser = [
        //     'username'          => $request->username,
        //     'password'          => Hash::make($request->password),
        //     'status'            => $request->status,
        //     'idRole'            => 2,
        // ];
        // // echo json_encode($dataUser); die();
        // $users = $this->mUser->create($dataUser);
        // return redirect('/login')->with('success', 'Berhasil Daftar, Silahkan Login!');
    }

    public function registerPaksa(){
        $dataAdmin = [
            'username'      => 'holaadmin',
            'password'      => Hash::make('katasandi'),
            'sandi'         => 'katasandi',
            'idRole'          => 1,
            'status'        => 1,
        ];
        $users = $this->mUser->create($dataAdmin);

        // $dataSekolah = [
        //     'username'      => 'sekolah',
        //     'password'      => Hash::make('ayosekolah'),
        //     'sandi'         => 'ayosekolah',
        //     'status'        => 1,
        //     'idSekolah'     => 1,
        //     'role'          => 2,
        // ];
        // $users = $this->mUser->create($dataSekolah);
    }

    public function logout()
    {
        session()->flush();
        // session()->forget('idPPeriode');
        return redirect('login');
    }
}