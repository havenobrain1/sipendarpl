<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranStatus extends Model
{
    protected $table = 'pendaftaran_status';
    protected $fillable = ['is_open'];
}
