<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\AbsenResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index(){
        $absen = Absen::all();

        return new AbsenResource(true, 'data berhasil diambil', $absen);

    }

    public function show($id){
        $absen=Absen:: whereId($id)-> first();
        
        if($absen){
            return new AbsenResource(true, 'data berhasil diambil', $absen);
        }
        return new AbsenResource(false, 'data tidak ditemukan', null);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal'     => 'required',
            'kelasjurusan_ta_id'      => 'required', 
            'siswakelas_id'      => 'required',
            'absensi'      => 'required', 
            'keterangan'      => 'required',            
           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $absen = Absen::create([
            'tanggal' => $request->tanggal,
            'kelasjurusan_ta_id'  => $request->kelasjurusan_ta_id,
            'siswakelas_id'  => $request->siswakelas_id,
            'absensi'  => $request->absensi,
            'keterangan'  => $request->keterangan,
        ]);

        if($absen) {
            //return success with Api Resource
            return new AbsenResource(true, 'Data Menu Berhasil Disimpan!', $absen);
        }

        //return failed with Api Resource
        return new AbsenResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    public function update(Request $request, Absen $absen)
    {
        $validator = Validator::make($request->all(), [
            'tanggal'     => 'required',
            'kelasjurusan_ta_id'      => 'required', 
            'siswakelas_id'      => 'required',
            'absensi'      => 'required', 
            'keterangan'      => 'required',  
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $absen->update([
            'tanggal' => $request->tanggal,
            'kelasjurusan_ta_id'  => $request->kelasjurusan_ta_id,
            'siswakelas_id'  => $request->siswakelas_id,
            'absensi'  => $request->absensi,
            'keterangan'  => $request->keterangan,
        ]);

        if($absen) {
            //return success with Api Resource
            return new AbsenResource(true, 'Data Menu Berhasil Diupdate!', $absen);
        }

        //return failed with Api Resource
        return new AbsenResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        if($absen->delete()) {
            //return success with Api Resource
            return new AbsenResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new AbsenResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}

