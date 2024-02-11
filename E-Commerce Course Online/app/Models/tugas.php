<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = ['namatugas','deskripsi','nilai','catatan','linktugas','kelas_id'];

    public function kelas(){
        return $this->belongsTo(Classes::class,'kelas_id');
    }
}


