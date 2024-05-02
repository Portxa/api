<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\BacaanResource;
use App\Models\Bacaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BacaanController extends Controller
{
    public function index(){
        $bacaan = Bacaan::all();

        return new BacaanResource( true, "Data Berhasil Diambil",$bacaan );
    }

    public function show($id){
        $bacaan=Bacaan::whereId($id)-> first();

        if($bacaan){
            return new BacaanResource( true, "Data Berhasil Diambil",$bacaan );
        }
        return new BacaanResource( false, "Data Tidak Ditemukan",null );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis_id' => 'required',
            'terbit' => 'required',
            'isbn' => 'required',
            'cover' => 'required',
            'ringkasan' => 'required',
            'penerbit_id' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $bacaan = Bacaan::create([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'terbit' => $request->terbit,
            'isbn' => $request->isbn,
            'cover' => $request->cover,
            'ringkasan' => $request->ringkasan,
            'penerbit_id' => $request->penerbit_id,
            'link' => $request->link,
        ]);

        if($bacaan) {
            //return success with Api Resource
            return new BacaanResource(true, 'Data Menu Berhasil Disimpan!', $bacaan);
        }

        //return failed with Api Resource
        return new BacaanResource(false, 'Data Menu Gagal Disimpan!', null);
    }
    
    public function update(Request $request,  Bacaan $bacaan)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis_id' => 'required',
            'terbit' => 'required',
            'isbn' => 'required',
            'cover' => 'required',
            'ringkasan' => 'required',
            'penerbit_id' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $bacaan->update([
            'judul' => $request->judul,
            'penulis_id' => $request->penulis_id,
            'terbit' => $request->terbit,
            'isbn' => $request->isbn,
            'cover' => $request->cover,
            'ringkasan' => $request->ringkasan,
            'penerbit_id' => $request->penerbit_id,
            'link' => $request->link,
        ]);

        if($bacaan) {
            //return success with Api Resource
            return new BacaanResource(true, 'Data Menu Berhasil Diupdate!', $bacaan);
        }

        //return failed with Api Resource
        return new BacaanResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    public function destroy(Bacaan $bacaan)
    {
        if($bacaan->delete()) {
            //return success with Api Resource
            return new BacaanResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new BacaanResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
