<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $fillable = ['id','alternatif_id','C1','C2','C3','C4','C5', 'C6'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
