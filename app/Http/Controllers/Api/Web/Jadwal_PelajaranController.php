<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal_Pelajaran;
use App\Http\Resources\Jadwal_PelajaranResource;
use Illuminate\Support\Facades\Validator;

class Jadwal_PelajaranController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $jadwal_pelajaran= Jadwal_Pelajaran::all();

        //return with Api Resource
        return new Jadwal_PelajaranResource(true, 'List Data Menus', $jadwal_pelajaran);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelasjurusan_ta_id'     => 'required',
            'hari'       => 'required',
            'pelajaran_id'     => 'required',
            'guru_id'       => 'required',
            'keterangan'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $jadwal_pelajaran = Jadwal_Pelajaran::create([
            'kelasjurusan_ta_id' => $request->kelasjurusan_ta_id,
            'hari'  => $request->hari,
            'pelajaran_id' =>$request->pelajaran_id,
            'guru_id'     =>$request->guru_id,
            'keterangan' =>$request->keterangan,
        ]);

        if($jadwal_pelajaran) {
            //return success with Api Resource
            return new Jadwal_PelajaranResource(true, 'Data Menu Berhasil Disimpan!', $jadwal_pelajaran);
        }

        //return failed with Api Resource
        return new Jadwal_pelajarantResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal_pelajaran = Jadwal_Pelajaran::whereId($id)->first();
        
        if($jadwal_pelajaran) {
            //return success with Api Resource
            return new Jadwal_pelajaranResource(true, 'Detail Data Menu!', $jadwal_pelajaran);
        }

        //return failed with Api Resource
        return new Jadwal_PelajaranResource(false, 'Detail Data Menu Tidak DItemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal_pelajaran $jadwal_pelajaran)
    {
        $validator = Validator::make($request->all(), [
            'kelasjurusan_ta_id'     => 'required',
            'hari'       => 'required',
            'pelajaran_id'     => 'required',
            'guru_id'       => 'required',
            'keterangan'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $jadwal_pelajaran->update([
            'kelasjurusan_ta_id' => $request->kelasjurusan_ta_id,
            'hari'  => $request->hari,
            'pelajaran_id' =>$request->pelajaran_id,
            'guru_id'     =>$request->guru_id,
            'keterangan' =>$request->keterangan,
        ]);

        if($jadwal_pelajaran) {
            //return success with Api Resource
            return new Jadwal_PelajaranResource(true, 'Data Menu Berhasil Diupdate!', $jadwal_pelajaran);
        }

        //return failed with Api Resource
        return new Jadwal_PelajaranResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal_Pelajaran $jadwal_pelajaran)
    {
        if($jadwal_pelajaran->delete()) {
            //return success with Api Resource
            return new Jadwal_PelajaranResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new Jadwal_PelajaranResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
