<?php

namespace App\Models\Admin\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    // softdelete itu untuk fitur dari laravel. User hapus, data untuk user hilang tapi di tabel tidak hilang. cuma di hiden
    use HasFactory, SoftDeletes;

    // Nama tabel
    protected $table = 'userRole';
    protected $guarded = ['id'];
}
