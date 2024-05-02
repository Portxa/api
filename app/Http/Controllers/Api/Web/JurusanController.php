<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Http\Resources\JurusanResource;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $jurusan = Jurusan::all();

        //return with Api Resource
        return new JurusanResource(true, 'List Data Menus', $jurusan);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan'     => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $jurusan = Jurusan::create([
            'jurusan' => $request->jurusan,  
        ]);

        if($jurusan) {
            //return success with Api Resource
            return new JurusanResource(true, 'Data Menu Berhasil Disimpan!', $jurusan);
        }

        //return failed with Api Resource
        return new JurusanResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::whereId($id)->first();
        
        if($jurusan) {
            //return success with Api Resource
            return new JurusanResource(true, 'Detail Data Menu!', $jurusan);
        }

        //return failed with Api Resource
        return new JurusanResource(false, 'Detail Data Menu Tidak DItemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $validator = Validator::make($request->all(), [
            'jurusan'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $jurusan->update([
            'jurusan' => $request->jurusan,
            
        ]);

        if($jurusan) {
            //return success with Api Resource
            return new JurusanResource(true, 'Data Menu Berhasil Diupdate!', $jurusan);
        }

        //return failed with Api Resource
        return new JurusanResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        if($jurusan->delete()) {
            //return success with Api Resource
            return new JurusanResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new JurusanResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
