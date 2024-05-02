<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\Siswa_kelasResource;
use App\Models\Siswa_kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Siswa_kelasController extends Controller
{
    public function index(){
        $siswa_kelas = Siswa_kelas::all();

        return new Siswa_kelasResource( true, "Data Berhasil Diambil",$siswa_kelas );
    }

    public function show($id){
        $siswa_kelas=Siswa_kelas::whereId($id)-> first();

        if($siswa_kelas){
            return new Siswa_kelasResource( true, "Data Berhasil Diambil",$siswa_kelas );
        }
        return new Siswa_kelasResource( false, "Data Tidak Ditemukan",null );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'kelasjurusan_id'     => 'required',
            'siswa_id'   => 'required',
            'keterangan'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $siswa_kelas = Siswa_kelas::create([
            'kelasjurusan_id' => $request->kelasjurusan_id,
            'siswa_id'  => $request->siswa_id,
            'keterangan'  => $request->keterangan,
        ]);

        if($siswa_kelas) {
            //return success with Api Resource
            return new Siswa_kelasResource(true, 'Data Menu Berhasil Disimpan!', $siswa_kelas);
        }

        //return failed with Api Resource
        return new Siswa_kelasResource(false, 'Data Menu Gagal Disimpan!', null);
    }
    
    public function update(Request $request,  Siswa_kelas $siswa_kelas)
    {
        $validator = Validator::make($request->all(), [
            'kelasjurusan_id'     => 'required',
            'siswa_id'   => 'required',
            'keterangan'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $siswa_kelas->update([
            'kelasjurusan_id' => $request->kelasjurusan_id,
            'siswa_id'  => $request->siswa_id,
            'keterangan'  => $request->keterangan,
        ]);

        if($siswa_kelas) {
            //return success with Api Resource
            return new Siswa_kelasResource(true, 'Data Menu Berhasil Diupdate!', $siswa_kelas);
        }

        //return failed with Api Resource
        return new Siswa_kelasResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    public function destroy(Siswa_kelas $siswa_kelas)
    {
        if($siswa_kelas->delete()) {
            //return success with Api Resource
            return new Siswa_kelasResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new Siswa_kelasResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
