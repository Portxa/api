<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Http\Resources\PenerbitResource;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $penerbit = Penerbit::all();

        //return with Api Resource
        return new PenerbitResource(true, 'List Data Menus', $penerbit);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penerbit'     => 'required',
            'alamat'       => 'required',
            'telp_kantor'     => 'required',
            'kontak'       => 'required',
            'telp_kontak'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $penerbit = Penerbit::create([
            'penerbit' => $request->penerbit,
            'alamat'  => $request->alamat,
            'telp_kantor' =>$request->telp_kantor,
            'kontak'     =>$request->kontak,
            'telp_kontak' =>$request->telp_kontak,
        ]);

        if($penerbit) {
            //return success with Api Resource
            return new PenerbitResource(true, 'Data Menu Berhasil Disimpan!', $penerbit);
        }

        //return failed with Api Resource
        return new PenerbitResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = Penerbit::whereId($id)->first();
        
        if($penerbit) {
            //return success with Api Resource
            return new PenerbitResource(true, 'Detail Data Menu!', $penerbit);
        }

        //return failed with Api Resource
        return new PenerbitResource(false, 'Detail Data Menu Tidak DItemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $validator = Validator::make($request->all(), [
            'penerbit'     => 'required',
            'alamat'       => 'required',
            'telp_kantor'     => 'required',
            'kontak'       => 'required',
            'telp_kontak'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $penerbit->update([
            'penerbit' => $request->penerbit,
            'alamat'  => $request->alamat,
            'telp_kantor' =>$request->telp_kantor,
            'kontak'     =>$request->kontak,
            'telp_kontak' =>$request->telp_kontak,
        ]);

        if($penerbit) {
            //return success with Api Resource
            return new PenerbitResource(true, 'Data Menu Berhasil Diupdate!', $penerbit);
        }

        //return failed with Api Resource
        return new PenerbitResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        if($penerbit->delete()) {
            //return success with Api Resource
            return new PenerbitResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new PenerbitResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
