<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tabungan;
use App\Http\Resources\TabunganResource;
use Illuminate\Support\Facades\Validator;

class TabunganController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $tabungan= Tabungan::all();

        //return with Api Resource
        return new TabunganResource(true, 'List Data Menus', $tabungan);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nominal'     => 'required',
            'tanggal'       => 'required',
            'jumlah_tabungan'     => 'required',
            'jumlah_penarikan'    => 'required',
            'tanggal_penarikan'  => 'required',
            'total_penarikan'  => 'required',
            'siswa_id'  => 'required',
            'kelasjurusan_ta_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $tabungan = Tabungan::create([
            'nominal' => $request->nominal,
            'tanggal'  => $request->tanggal,
            'jumlah_tabungan' =>$request->jumlah_tabungan,
            'jumlah_penarikan'     =>$request->jumlah_penarikan,
            'tanggal_penarikan' =>$request->tanggal_penarikan,
            'total_penarikan' =>$request->total_penarikan,
            'siswa_id' =>$request->siswa_id,
            'kelasjurusan_ta_id' =>$request->kelasjurusan_ta_id,   
        ]);

        if($tabungan) {
            //return success with Api Resource
            return new TabunganResource(true, 'Data Menu Berhasil Disimpan!', $tabungan);
        }

        //return failed with Api Resource
        return new TabunganResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabungan = Tabungan::whereId($id)->first();
        
        if($kalender_event) {
            //return success with Api Resource
            return new TabunganResource(true, 'Detail Data Menu!', $tabungan);
        }

        //return failed with Api Resource
        return new TabunganResource(false, 'Detail Data Menu Tidak DItemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tabungan  $tabungan)
    {
        $validator = Validator::make($request->all(), [
            'nominal'     => 'required',
            'tanggal'       => 'required',
            'jumlah_tabungan'     => 'required',
            'jumlah_penarikan'    => 'required',
            'tanggal_penarikan'  => 'required',
            'total_penarikan'  => 'required',
            'siswa_id'  => 'required',
            'kelasjurusan_ta_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $tabungan->update([
            'nominal' => $request->nominal,
            'tanggal'  => $request->tanggal,
            'jumlah_tabungan' =>$request->jumlah_tabungan,
            'jumlah_penarikan'     =>$request->jumlah_penarikan,
            'tanggal_penarikan' =>$request->tanggal_penarikan,
            'total_penarikan' =>$request->total_penarikan,
            'siswa_id' =>$request->siswa_id,
            'kelasjurusan_ta_id' =>$request->kelasjurusan_ta_id,   
        ]);

        if($tabungan) {
            //return success with Api Resource
            return new TabunganResource(true, 'Data Menu Berhasil Diupdate!', $tabungan);
        }

        //return failed with Api Resource
        return new TabunganResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Tabungan $id)
    {
        if($id->delete()) {
            //return success with Api Resource
            return new TabunganResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new TabunganResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
