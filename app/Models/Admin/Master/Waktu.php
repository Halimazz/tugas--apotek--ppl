<?php

namespace App\Models\Admin\Master;

use App\Models\Admin\User\UserModel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Waktu extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'waktu';

    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(UserModel::class,'idPegawai','id');
    }
}
