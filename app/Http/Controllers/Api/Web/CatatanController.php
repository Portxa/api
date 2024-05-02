<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\CatatanResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Validator;

class CatatanController extends Controller
{
    public function index(){
        $catatan=Note::all();

        return new catatanResource(true, 'data berhasil diambil', $catatan);

    }

    public function show($id){
        $catatan=Note:: whereId($id)-> first();
        
        if($catatan){
            return new CatatanResource(true, 'data berhasil diambil', $catatan);
        }
        return new CatatanResource(false, 'data tidak ditemukan', null);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'tanggal'      => 'required', 
            'isi'      => 'required',
            'siswakelas_id'      => 'required',            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $catatan = Note::create([
            'judul' => $request->judul,
            'tanggal'  => $request->tanggal,
            'isi'  => $request->isi,
            'siswakelas_id'  => $request->siswakelas_id,
        ]);

        if($catatan) {
            //return success with Api Resource
            return new CatatanResource(true, 'Data Menu Berhasil Disimpan!', $catatan);
        }

        //return failed with Api Resource
        return new CatatanResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    public function update(Request $request, Note $catatan)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'tanggal'      => 'required', 
            'isi'      => 'required',
            'siswakelas_id'      => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $catatan->update([
            'judul' => $request->judul,
            'tanggal'  => $request->tanggal,
            'isi'  => $request->isi,
            'siswakelas_id'  => $request->siswakelas_id,

        ]);

        if($catatan) {
            //return success with Api Resource
            return new CatatanResource(true, 'Data Menu Berhasil Diupdate!', $catatan);
        }

        //return failed with Api Resource
        return new catatanResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $catatan)
    {
        if($catatan->delete()) {
            //return success with Api Resource
            return new CatatanResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new CatatanResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}

