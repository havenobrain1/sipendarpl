<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai'; // Menentukan nama tabel yang benar

    protected $fillable = [
        'user_id', 'nilai_matematika', 'nilai_ipa', 'nilai_ips', 'nilai_bahasa_indonesia', 'nilai_rata_rata'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
