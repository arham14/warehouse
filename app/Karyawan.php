<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'master_karyawan';

    protected $fillable = [
        'nip', 'nik', 'nama_karyawan', 'no_hp', 'alamat', 'status', 'email',
    ];
}
