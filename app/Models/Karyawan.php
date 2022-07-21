<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table        = 'karyawan';
    protected $primaryKey   = 'id_karyawan';
    public $timestamps      = false;
    protected $guarded      = [];

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id_dept', 'id_dept');
    }
}
