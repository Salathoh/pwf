<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDosen extends Model
{
    protected $table = "data_dosen";
    protected $primaryKey = "id";
    
    protected $fillable = ['nama', 'nip', 'mata_kuliah', 'email'];
}

