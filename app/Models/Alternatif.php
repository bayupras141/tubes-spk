<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $fillable = ['id','kode_alternatif','nama_alternatif', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6'];
}
