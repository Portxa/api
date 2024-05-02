<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\TugassekolahResource;
use App\Models\Tugassekolah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TugassekolahController extends Controller
{
    public function index(){
        $tugassekolah = Tugassekolah::all();

        return new TugassekolahResource( true, "Data Berhasil Diambil",$tugassekolah );
    }

    public function show($id){
        $tugassekolah=Tugassekolah::whereId($id)-> first();

        if($tugassekolah){
            return new TugassekolahResource( true, "Data Berhasil Diambil",$tugassekolah );
        }
        return new TugassekolahkResource( false, "Data Tidak Ditemukan",null );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'pelajaran_id' => 'required',
            'tgl' => 'required',
            'deskripsi' => 'required',
            'tgl_pengumpulan' => 'required',
            'isi_tugas' => 'required',
            'siswakelas_id' => 'required',
            'guru_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $tugassekolah = Tugassekolah::create([
            'pelajaran_id' =>  $request->pelajaran_id,
            'tgl' =>  $request->tgl,
            'deskripsi' =>  $request->deskripsi,
            'tgl_pengumpulan' =>  $request->tgl_pengumpulan,
            'isi_tugas' =>  $request->isi_tugas,
            'siswakelas_id' =>  $request->siswakelas_id,
            'guru_id' =>  $request->guru_id,
        ]);

        if($tugassekolah) {
            //return success with Api Resource
            return new TugassekolahResource(true, 'Data Menu Berhasil Disimpan!', $tugassekolah);
        }

        //return failed with Api Resource
        return new TugassekolahResource(false, 'Data Menu Gagal Disimpan!', null);
    }
    
    public function update(Request $request,  Tugassekolah $tugassekolah)
    {
        $validator = Validator::make($request->all(), [
            'pelajaran_id' => 'required',
            'tgl' => 'required',
            'deskripsi' => 'required',
            'tgl_pengumpulan' => 'required',
            'isi_tugas' => 'required',
            'siswakelas_id' => 'required',
            'guru_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $tugassekolah->update([
            'pelajaran_id' =>  $request->pelajaran_id,
            'tgl' =>  $request->tgl,
            'deskripsi' =>  $request->deskripsi,
            'tgl_pengumpulan' =>  $request->tgl_pengumpulan,
            'isi_tugas' =>  $request->isi_tugas,
            'siswakelas_id' =>  $request->siswakelas_id,
            'guru_id' =>  $request->guru_id,
        ]);

        if($tugassekolah) {
            //return success with Api Resource
            return new TugassekolahkResource(true, 'Data Menu Berhasil Diupdate!', $tugassekolah);
        }

        //return failed with Api Resource
        return new TugassekolahResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    public function destroy(Tugassekolah $tugassekolah)
    {
        if($tugassekolah->delete()) {
            //return success with Api Resource
            return new TugassekolahResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new TugassekolahResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
