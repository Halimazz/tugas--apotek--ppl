<?php

namespace App\Http\Controllers\Admin;
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
}
