<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'yuni_kategoris';
    protected $fillable = ['nama'];

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'kategori_id');
    }
}

