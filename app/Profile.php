<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
	// Digunakan untuk menggunakan soft delete secara default saat menghapus data
    use SoftDeletes;
 
    protected $fillable = [
        'nama', 'alamat', 'email', 'foto'
    ];
    protected $dates = ['deleted_at'];
}
