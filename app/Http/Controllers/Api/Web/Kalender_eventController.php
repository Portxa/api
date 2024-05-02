<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kalender_event;
use App\Http\Resources\Kalender_eventResource;
use Illuminate\Support\Facades\Validator;

class Kalender_eventController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $kalender_event= Kalender_event::all();

        //return with Api Resource
        return new Kalender_eventResource(true, 'List Data Menus', $kalender_event);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'tanggal'       => 'required',
            'deskripsi'     => 'required',
            'tempat'       => 'required',
            'penanggungjawab'  => 'required',
            'kontak'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $kalender_event = Kalender_event::create([
            'judul' => $request->judul,
            'tanggal'  => $request->tanggal,
            'deskripsi' =>$request->deskripsi,
            'tempat'     =>$request->tempat,
            'penanggungjawab' =>$request->penanggungjawab,
            'kontak' =>$request->kontak,
            
        ]);

        if($kalender_event) {
            //return success with Api Resource
            return new Kalender_eventResource(true, 'Data Menu Berhasil Disimpan!', $kalender_event);
        }

        //return failed with Api Resource
        return new Kalender_eventResource(false, 'Data Menu Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kalender_event = Kalender_event::whereId($id)->first();
        
        if($kalender_event) {
            //return success with Api Resource
            return new Kalender_eventResource(true, 'Detail Data Menu!', $kalender_event);
        }

        //return failed with Api Resource
        return new Kalender_eventResource(false, 'Detail Data Menu Tidak DItemukan!', null);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kalender_event  $kalender_event)
    {
        $validator = Validator::make($request->all(), [
            'judul'     => 'required',
            'tanggal'       => 'required',
            'deskripsi'     => 'required',
            'tempat'       => 'required',
            'penanggungjawab'  => 'required',
            'kontak'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $kalender_event->update([
            'judul' => $request->judul,
            'tanggal'  => $request->tanggal,
            'deskripsi' =>$request->deskripsi,
            'tempat'     =>$request->tempat,
            'penanggungjawab' =>$request->penanggungjawab,
            'kontak' =>$request->kontak,
        ]);

        if($kalender_event) {
            //return success with Api Resource
            return new Kalender_eventResource(true, 'Data Menu Berhasil Diupdate!', $kalender_event);
        }

        //return failed with Api Resource
        return new Kalender_eventResource(false, 'Data Menu Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (Kalender_event $id)
    {
        if($id->delete()) {
            //return success with Api Resource
            return new Kalender_eventResource(true, 'Data Menu Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new Kalender_eventResource(false, 'Data Menu Gagal Dihapus!', null);
    }
}
