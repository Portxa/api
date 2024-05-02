<?php
namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\MatpelResource;
use App\Models\matpel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matpel = matpel::all();
        return new MatpelResource( true, "Data Berhasil Diambil. Cihuyyy",$matpel );
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'pelajaran'      => 'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $matpel = matpel::create([
            'pelajaran' => $request->pelajaran,
        ]);

        if($matpel) {
            //return success with Api Resource
            return new MatpelResource(true, 'Data Mata Pelajran Berhasil Disimpan!', $matpel);
        }

        //return failed with Api Resource
        return new MatpelResource(false, 'Data Mata Pelajaran Gagal Disimpan!', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $matpel=matpel::whereId($id)-> first();
        if($matpel){
            return new MatpelResource( true, "Data Berhasil Diambil. Cihuyyy",$matpel );
        }
            return new MatpelResource( false, "Data Tidak Ditemukan.",null );
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matpel $matpel)
    {
        $validator = Validator::make($request->all(),[
            'pelajaran'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $siswa->update([
            'pelajaran' => $request->pelajaran
        ]);

        if($matpel) {
            //return success with Api Resource
            return new MatpelResource(true, 'Data Mata Pelajaran Berhasil Diupdate!', $matpel);
        }

        //return failed with Api Resource
        return new MatpelResource(false, 'Data Mata Pelajaran Gagal Diupdate!', null);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matpel $matpel)
    {
        if($matpel->delete()) {
            //return success with Api Resource
            return new MatpelResource(true, 'Data Mata Pelajaran Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new MatpelResource(false, 'Data Mata Pelajaran Gagal Dihapus!', null);
    }
}
