<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
use App\Models\Kelas;
use App\Models\Mahasiswa_Matakuliah;

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
        'featured_image',
        'Jurusan',
        'No_Handphone',
        'Email',
        'TTL',
        'kelas_id'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    
    public function mataKuliah(){
        return $this->belongsToMany(MataKuliah::class,"mahasiswa_matakuliah", "mahasiswa_id", "matakuliah_id")->withPivot('nilai');
    }
}
   
