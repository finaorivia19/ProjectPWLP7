<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswas;

class Mahasiswa extends Model
{
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswamenyimpan record di tabel mahasiswa
    public $timestamps= false; 
    protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'Nim',
        'Nama',
        'kelas_id',
        'jurusan',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
