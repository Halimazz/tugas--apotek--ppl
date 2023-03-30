<?php

namespace App\Models\Admin\Master;

use App\Models\UserModel;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//library
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class Dosis extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'dosis';

    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(UserModel::class,'idPegawai','id');
    }
}
