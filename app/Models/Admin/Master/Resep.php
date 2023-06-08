<?php

namespace App\Models\Admin\Master;

use App\Models\Admin\User\UserModel;
use App\Models\Admin\Master\Dosis;
use App\Models\Admin\Master\Waktu;
use App\Models\Admin\Master\Obat;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Resep extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'resep_obat';

    protected $guarded = ['id'];
    public function obat(){
        return $this->belongsTo(Obat::class,'idMObat','id');
    }
    public function dosis(){
        return $this->belongsTo(Dosis::class,'idMDosis','id');
    }
    public function waktu(){
        return $this->belongsTo(Waktu::class,'idMWaktu','id');
    }
    public function user(){
        return $this->belongsTo(UserModel::class,'idPegawai','id');
    }
    public function dokter()
    {
        return $this->belongsTo(UserModel::class, 'idMDokter','id')->withDefault();
    }
    
    public function apoteker(){
        return $this->belongsTo(UserModel::class,'idMApoteker','id');
    }
    public function kasir(){
        return $this->belongsTo(UserModel::class,'idMKasir','id');
    }
}
