<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_kelas extends Model
{
    use HasFactory;

    protected $table = 'list_kelas';

    protected $fillable = [
        'user_kelas_id', 
        'kelas_user_id',
    ];
}
