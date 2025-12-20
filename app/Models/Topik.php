<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    use HasFactory;
    protected $table = 'tb_topik';

    public function sumberBelajar()
    {
        return $this->hasMany(SumberBelajar::class, 'topik_id');
    }
}
