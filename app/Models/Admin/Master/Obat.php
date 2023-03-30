<?php

namespace App\Models\Admin\Master;

use App\Models\UserModel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Obat extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'obat';

    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(UserModel::class,'idPegawai','id');
    }
}
