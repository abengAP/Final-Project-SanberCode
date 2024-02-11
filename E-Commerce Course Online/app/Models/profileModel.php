<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profileModel extends Model
{
    use HasFactory;
    protected $table = 'profile';

    protected $fillable= [
        'alamat',
        'superadmin_status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
