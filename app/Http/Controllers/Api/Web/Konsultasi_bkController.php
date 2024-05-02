<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\Konsultasi_bkResource;
use App\Models\Konsultasi_bk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Konsultasi_bkController extends Controller
{
    public function index(){
        $konsultasi_bk = Konsultasi_bk::all();

        return new Konsultasi_bkResource( true, "Data Berhasil Diambil",$konsultasi_bk );
    }

    public function show($id){
        $konsultasi_bk=Konsultasi_bk::whereId($id)-> first();

        if($konsultasi_bk){
            return new Konsultasi_bkResource( true, "Data Berhasil Diambil",$konsultasi_bk );
        }
        return new Konsultasi_bkResource( false, "Data Tidak Ditemukan",null );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'tujuan'  => 'required',
            'tanggal' => 'required',
            'status'  => 'required',
            'tempat'  => 'required',
            'jam'  => 'required',
            'siswakelas_id'  => 'required',
            'guru_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $konsultasi_bk = Konsultasi_bk::create([
            'tujuan'  =>  $request->tujuan,
            'tanggal' =>  $request->tanggal,
            'status'  =>  $request->status,
            'tempat'  =>  $request->tempat,
            'jam'  =>  $request->jam,
            'siswakelas_id'  =>  $request->siswakelas_id,
            'guru_id'  =>  $request->guru_id,
        ]);

        if($konsultasi_bk) {
            //return success with Api Resource
            return new Konsultasi_bkResource(true, 'Data Menu Berhasil Disimpan!', $konsultasi_bk);
        }

        //return failed with Api Resource
        return new Konsultasi_bkResource(false, 'Data Menu Gagal Disimpan!', null);
    }
    
    public function update(Request $request,  Konsultasi_bk $konsultasi_bk)
    {
        $validator = Validator::make($request->all(), [
            'tujuan'  => 'required',
            'tanggal' => 'required',
            'status'  => 'required',
            'tempat'  => 'required',
            'jam'  => 'required',
            'siswakelas_id'  => 'required',
            'guru_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $konsultasi_bk->update([
            'tujuan'  =>  $request->tujuan,
            'tanggal' =>  $request->tanggal,
            'status'  =>  $request->status,
            'tempat'  =>  $request->tempat,
            'jam'  =>  $request->jam,
            'siswakelas_id'  =>  $request->siswakelas_id,
            'guru_id'  =>  $request->guru_id,
        ]);

        if($konsultasi_bk) {
            //return success with Api Resource
            return new Konsultasi_bkResource(true, 'Data Menu Berhasil Diupdate!', $konsultasi_bk);
        }

        //return failed with Api Resource
        return new Konsultasi_bkResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    public function destroy(Konsultasi_bk $konsultasi_bk)
    {
        if($konsultasi_bk->delete()) {
            //return success with Api Resource
            return new Konsultasi_bkResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new Konsultasi_bkResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
