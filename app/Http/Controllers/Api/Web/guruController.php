<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\GuruResource;
use App\Models\guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class guruController extends Controller
{
    public function index(){
        $guru = guru::all();

        return new GuruResource( true, "Data Berhasil Diambil",$guru );
    }

    public function show($id){
        $guru=guru::whereId($id)-> first();

        if($guru){
            return new GuruResource( true, "Data Berhasil Diambil",$guru );
        }
        return new GuruResource( false, "Data Tidak Ditemukan",null );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'alamat'   => 'required',
            'email'    => 'required',
            'telepon'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $guru = guru::create([
            'nama' => $request->nama,
            'alamat'  => $request->alamat,
            'email'  => $request->email,
            'telepon'  => $request->telepon,
        ]);

        if($guru) {
            //return success with Api Resource
            return new GuruResource(true, 'Data Menu Berhasil Disimpan!', $guru);
        }

        //return failed with Api Resource
        return new GuruResource(false, 'Data Menu Gagal Disimpan!', null);
    }
    
    public function update(Request $request,  guru $guru)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'alamat'   => 'required',
            'email'    => 'required',
            'telepon'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $guru->update([
            'nama' => $request->nama,
            'alamat'  => $request->alamat,
            'email'  => $request->email,
            'telepon'  => $request->telepon,
        ]);

        if($guru) {
            //return success with Api Resource
            return new GuruResource(true, 'Data Menu Berhasil Diupdate!', $guru);
        }

        //return failed with Api Resource
        return new GuruResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    public function destroy(guru $guru)
    {
        if($guru->delete()) {
            //return success with Api Resource
            return new GuruResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new GuruResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
