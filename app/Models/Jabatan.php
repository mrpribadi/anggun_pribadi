<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table        = 'jabatan';
    protected $primaryKey   = 'id_jabatan';
    public $timestamps      = false;
    protected $guarded      = [];

    public function level()
    {
        return $this->hasOne(Level::class, 'id_level', 'id_level');
    }
}
