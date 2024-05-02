<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\PenulisResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penulis;
use Illuminate\Support\Facades\Validator;

class PenulisController extends Controller
{
    public function index(){
        $penulis=penulis::all();

        return new PenulisResource(true, 'data berhasil diambil', $penulis);

    }

    public function show($id){
        $penulis=penulis:: whereId($id)-> first();
        
        if($penulis){
            return new PenulisResource(true, 'data berhasil diambil', $penulis);
        }
        return new PenulisResource(false, 'data tidak ditemukan', null);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penulis'     => 'required',
            'alamat'      => 'required', 
            'telp'      => 'required' 
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $penulis = penulis::create([
            'penulis' => $request->penulis,
            'alamat'  => $request->alamat,
            'telp'  => $request->telp,
        ]);

        if($penulis) {
            //return success with Api Resource
            return new PenulisResource(true, 'Data Menu Berhasil Disimpan!', $penulis);
        }

        //return failed with Api Resource
        return new PenulisResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    public function update(Request $request, penulis $penulis)
    {
        $validator = Validator::make($request->all(), [
            'penulis'     => 'required',
            'alamat'      => 'required', 
            'telp'      => 'required' 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $penulis->update([
            'penulis' => $request->penulis,
            'alamat'  => $request->alamat,
            'telp'  => $request->telp,
        ]);

        if($penulis) {
            //return success with Api Resource
            return new PenulisResource(true, 'Data Menu Berhasil Diupdate!', $penulis);
        }

        //return failed with Api Resource
        return new PenulisResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(penulis $penulis)
    {
        if($penulis->delete()) {
            //return success with Api Resource
            return new PenulisResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new PenulisResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}

