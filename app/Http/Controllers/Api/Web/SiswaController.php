<?php
namespace App\Http\Controllers\Api\Web;

use App\Http\Resources\SiswaResource;
use App\Models\siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(){
        $siswa = siswa::all();
        return new SiswaResource( true, "Data Berhasil Diambil. Cihuyyy",$siswa );
    }

    public function show($id){
        $siswa=siswa::whereId($id)-> first();
        if($siswa){
            return new SiswaResource( true, "Data Berhasil Diambil. Cihuyyy",$siswa );
        }
            return new SiswaResource( false, "Data Tidak Ditemukan.",null );
        
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama'      => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'telepon'   => 'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $siswa = siswa::create([
            'nama' => $request->nama,
            'alamat'  => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);

        if($siswa) {
            //return success with Api Resource
            return new SiswaResource(true, 'Data Siswa Berhasil Disimpan!', $siswa);
        }

        //return failed with Api Resource
        return new SiswaResource(false, 'Data Siswa Gagal Disimpan!', null);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'url'      => 'required' 
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update menu
        $siswa->update([
            'name' => $request->name,
            'url'  => $request->url,
        ]);

        if($siswa) {
            //return success with Api Resource
            return new SiswaResource(true, 'Data Siswa Berhasil Diupdate!', $siswa);
        }

        //return failed with Api Resource
        return new SiswaResource(false, 'Data Siswa Gagal Diupdate!', null);
    }
    public function destroy(Siswa $siswa)
    {
        if($siswa->delete()) {
            //return success with Api Resource
            return new SiswaResource(true, 'Data Siswa Berhasil Dihapus!', null);
        }

        //return failed with Api Resource
        return new SiswaResource(false, 'Data Siswa Gagal Dihapus!', null);
    }

}