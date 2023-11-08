<?php
// Inside app/Models/Berita.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id";
    
    protected $fillable = ['judul', 'konten'];
}
