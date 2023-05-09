<?php 

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        //
        if($request->has('nama')) {
            $nama = request('nama');
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', '%'.$nama.'%')->paginate(5);
            return view('mahasiswas.index', compact('mahasiswas'));
        } else {
            // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
            $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->paginate(5);
            return view('mahasiswas.index', compact('mahasiswas'));
        }
        //fungsi eloquent menampilkan data menggunakan pagination
    }


 public function create()
 {
//  return view('mahasiswas.create');
    $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
    return view('mahasiswas.create',['kelas' =>$kelas]);
 }

 public function store(Request $request)
 {
    if($request->file('image')){
        $image_name = $request->file('image')->store('images', 'public');
    }


 //melakukan validasi data
 $request->validate([
 'Nim' => 'required',
 'Nama' => 'required',
 'TTL' => 'required',
 'kelas' => 'required',
 'Jurusan' => 'required',
 'No_Handphone' => 'required',
'Email' => 'required',
 ]);
 
 //fungsi eloquent untuk menambah data
 $mahasiswas= new Mahasiswa;
 $mahasiswas->Nim=$request->get('Nim');
 $mahasiswas->Nama=$request->get('Nama');
 $mahasiswas->featured_image=$image_name;
 $mahasiswas->TTL=$request->get('TTL');
 $mahasiswas->Jurusan=$request->get('Jurusan');
 $mahasiswas->No_Handphone=$request->get('No_Handphone');
 $mahasiswas->Email=$request->get('Email');
 
 
 //fungsi eloquent untuk menambah data dengan relasi belongs to
 $kelas = new Kelas;
 $kelas->id = $request->get('kelas');

 $mahasiswas->kelas()->associate($kelas);
 $mahasiswas->save();

 //jika data berhasil ditambahkan, akan kembali ke halaman utama
 return redirect()->route('mahasiswas.index')
 ->with('success', 'Mahasiswa Berhasil Ditambahkan');

 }
 
 public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

 public function edit($Nim)
 {
//menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
    $Mahasiswa = Mahasiswa::find($Nim);
    $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
    return view('mahasiswas.edit',compact('Mahasiswa','kelas')); }

 public function update(Request $request, $Nim)
 {
    $Mahasiswa = Mahasiswa::find($Nim);
   if($Mahasiswa->featured_image && file_exists(storage_path('app/public/' . $Mahasiswa->featured_image))){
    Storage::delete('public/' . $Mahasiswa->featured_image);
   }
   $image_name = $request->file('image')->store('images', 'public');
   

//melakukan validasi data
 $request->validate([
 'Nim' => 'required',
 'Nama' => 'required',
//  'TTL' => 'required',
 'Kelas' => 'required',
 'Jurusan' => 'required',
//  'No_Handphone' => 'required',
//  'Email' => 'required',
 ]);

 $mahasiswas = Mahasiswa:: with('kelas')->where('nim', $Nim)->first();
 $mahasiswas->nim = $request->get('Nim');
 $mahasiswas->nama = $request->get('Nama');
 $mahasiswas->jurusan = $request->get('Jurusan');
 $mahasiswas->featured_image = $image_name;
 //$mahasiswas->save();

 $kelas = new Kelas;
 $kelas->id = $request->get('Kelas');

 $mahasiswas->kelas()->associate($kelas);
 $mahasiswas->save();

 return redirect()->route('mahasiswas.index')
 ->with('success', 'Mahasiswa Berhasil Diupdate');

//  //fungsi eloquent untuk mengupdate data inputan kita
//  Mahasiswa::find($Nim)->update($request->all());
// //jika data berhasil diupdate, akan kembali ke halaman utama
//  return redirect()->route('mahasiswas.index')
//  ->with('success', 'Mahasiswa Berhasil Diupdate');
}
 public function destroy( $Nim)
 {
//fungsi eloquent untuk menghapus data
 Mahasiswa::find($Nim)->delete();
 return redirect()->route('mahasiswas.index')
 -> with('success', 'Mahasiswa Berhasil Dihapus');
 }
 
    public function nilai($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.nilai', compact('Mahasiswa'));
    }
    public function cetak_pdf($Nim){
        $Mahasiswa = Mahasiswa::find($Nim);
        $pdf = PDF::loadview('mahasiswas.cetak_pdf',['Mahasiswa'=>$Mahasiswa]);
        return $pdf->stream();
     }
 };

 