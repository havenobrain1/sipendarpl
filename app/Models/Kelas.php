<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    public function siswa()
    {
        return $this->belongsToMany(Pendaftaran::class, 'siswa_kelas', 'kelas_id', 'pendaftaran_id');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas', 'kelas_id', 'guru_id');
    }
}
