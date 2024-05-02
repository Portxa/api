<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\Kelasjurusan_taResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelasjurusan_ta;
use Illuminate\Support\Facades\Validator;

class Kelasjurusan_taController extends Controller
{
    public function index(){
        $kelasjurusan_ta=Kelasjurusan_ta::all();

        return new Kelasjurusan_taResource(true, 'data berhasil diambil', $kelasjurusan_ta);

    }

    public function show($id){
        $kelasjurusan_ta=kelasjurusan_ta:: whereId($id)-> first();
        
        if($kelasjurusan_ta){
            return new Kelasjurusan_taResource(true, 'data berhasil diambil', $kelasjurusan_ta);
        }
        return new Kelasjurusan_taResource(false, 'data tidak ditemukan', null);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran'     => 'required',
            'semester'      => 'required', 
            'kelas'      => 'required',
            'jurusan_id'      => 'required',
            'guru_id'      => 'required' 
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $kelasjurusan_ta = kelasjurusan_ta::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester'  => $request->semester,
            'kelas'  => $request->kelas,
            'jurusan_id'  => $request->jurusan_id,
            'guru_id'  => $request->guru_id,

        ]);

        if($kelasjurusan_ta) {
            //return success with Api Resource
            return new Kelasjurusan_taResource(true, 'Data Menu Berhasil Disimpan!', $kelasjurusan_ta);
        }

        //return failed with Api Resource
        return new Kelasjurusan_taResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    public function update(Request $request, kelasjurusan_ta $kelasjurusan_ta)
    {
        $validator = Validator::make($request->all(), [
            'tahun_ajaran'     => 'required',
            'semester'      => 'required', 
            'kelas'      => 'required',
            'jurusan_id'      => 'required',
            'guru_id'      => 'required' 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $kelasjurusan_ta->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester'  => $request->semester,
            'kelas'  => $request->kelas,
            'jurusan_id'  => $request->jurusan_id,
            'guru_id'  => $request->guru_id,

        ]);

        if($kelasjurusan_ta) {
            //return success with Api Resource
            return new Kelasjurusan_taResource(true, 'Data Menu Berhasil Diupdate!', $kelasjurusan_ta);
        }

        //return failed with Api Resource
        return new Kelasjurusan_taResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kelasjurusan_ta $kelasjurusan_ta)
    {
        if($kelasjurusan_ta->delete()) {
            //return success with Api Resource
            return new Kelasjurusan_taResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new Kelasjurusan_taResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}

