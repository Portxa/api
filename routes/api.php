<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //route login
    Route::post('/login', [App\Http\Controllers\Api\Admin\LoginController::class, 'index']);

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth:api'], function() {

        //data user
        Route::get('/user', [App\Http\Controllers\Api\Admin\LoginController::class, 'getUser']);

        //refresh token JWT
        Route::get('/refresh', [App\Http\Controllers\Api\Admin\LoginController::class, 'refreshToken']);

        //logout
        Route::post('/logout', [App\Http\Controllers\Api\Admin\LoginController::class, 'logout']);
    
        //Tags
        Route::apiResource('/tags', App\Http\Controllers\Api\Admin\TagController::class);

        //Category
        Route::apiResource('/categories', App\Http\Controllers\Api\Admin\CategoryController::class);
        
        //Poss
        Route::apiResource('/posts', App\Http\Controllers\Api\Admin\PostController::class);
        
        //Menus
        Route::apiResource('/menus', App\Http\Controllers\Api\Admin\MenuController::class);

        //Sliders
        Route::apiResource('/sliders', App\Http\Controllers\Api\Admin\SliderController::class);

        //Users
        Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class);

        //dashboard
        Route::get('/dashboard', [App\Http\Controllers\Api\Admin\DashboardController::class, 'index']);
    });

});

//group route with prefix "web"
Route::prefix('web')->group(function () {

    //index tags
    Route::get('/tags', [App\Http\Controllers\Api\Web\TagController::class, 'index']);

    //show tag
    Route::get('/tags/{slug}', [App\Http\Controllers\Api\Web\TagController::class, 'show']);

    //index categories
    Route::get('/categories', [App\Http\Controllers\Api\Web\CategoryController::class, 'index']);

    //show category
    Route::get('/categories/{slug}', [App\Http\Controllers\Api\Web\CategoryController::class, 'show']);

    //categories sidebar
    Route::get('/categorySidebar', [App\Http\Controllers\Api\Web\CategoryController::class, 'categorySidebar']);

    //index posts
    Route::get('/posts', [App\Http\Controllers\Api\Web\PostController::class, 'index']);

    //show posts
    Route::get('/posts/{slug}', [App\Http\Controllers\Api\Web\PostController::class, 'show']);

    //posts homepage
    Route::get('/postHomepage', [App\Http\Controllers\Api\Web\PostController::class, 'postHomepage']);

    //store comment
    Route::post('/posts/storeComment', [App\Http\Controllers\Api\Web\PostController::class, 'storeComment']);

    //store image
    Route::post('/posts/storeImage', [App\Http\Controllers\Api\Web\PostController::class, 'storeImagePost']);

    //index menus
    Route::get('/menus', [App\Http\Controllers\Api\Web\MenuController::class, 'index']);

    //index sliders
    Route::get('/sliders', [App\Http\Controllers\Api\Web\SliderController::class, 'index']);


    Route::post('/guru/input', [App\Http\Controllers\Api\Web\GuruController::class, 'store']);
    Route::get('/guru', [App\Http\Controllers\Api\Web\GuruController::class, 'index']);
    Route::put('/guru/update/{guru}', [App\Http\Controllers\Api\Web\GuruController::class, 'update']);
    Route::delete('/guru/delete/{guru}', [App\Http\Controllers\Api\Web\GuruController::class, 'destroy']);
    Route::get('/guru/{id}', [App\Http\Controllers\Api\Web\GuruController::class, 'show']);

    Route::post('/siswa_kelas/input', [App\Http\Controllers\Api\Web\Siswa_kelasController::class, 'store']);
    Route::get('/siswa_kelas', [App\Http\Controllers\Api\Web\Siswa_kelasController::class, 'index']);
    Route::put('/siswa_kelas/update/{Siswa_kelas}', [App\Http\Controllers\Api\Web\Siswa_kelasController::class, 'update']);
    Route::get('/siswa_kelas/{id}', [App\Http\Controllers\Api\Web\Siswa_kelasController::class, 'show']);
    Route::delete('/siswa_kelas/delete/{siswa_kelas}', [App\Http\Controllers\Api\Web\Siswa_kelasController::class, 'destroy']);

    Route::post('/bacaan/input', [App\Http\Controllers\Api\Web\BacaanController::class, 'store']);
    Route::get('/bacaan', [App\Http\Controllers\Api\Web\BacaanController::class, 'index']);
    Route::put('/bacaan/update/{bacaan}', [App\Http\Controllers\Api\Web\BacaanController::class, 'update']);
    Route::get('/bacaan/{id}', [App\Http\Controllers\Api\Web\BacaanController::class, 'show']);
    Route::delete('/bacaan/delete/{bacaan}', [App\Http\Controllers\Api\Web\BacaanController::class, 'destroy']);

    Route::post('/konsultasi_bk/input', [App\Http\Controllers\Api\Web\Konsultasi_bkController::class, 'store']);
    Route::get('/konsultasi_bk', [App\Http\Controllers\Api\Web\Konsultasi_bkController::class, 'index']);
    Route::put('/konsultasi_bk/update/{konsultasi_bk}', [App\Http\Controllers\Api\Web\Konsultasi_bkController::class, 'update']);
    Route::get('/konsultasi_bk/{id}', [App\Http\Controllers\Api\Web\Konsultasi_bkController::class, 'show']);
    Route::delete('/konsultasi_bk/delete/{konsultasi_bk}', [App\Http\Controllers\Api\Web\Konsultasi_bkController::class, 'destroy']);

    Route::post('/tugassekolah/input', [App\Http\Controllers\Api\Web\TugassekolahController::class, 'store']);
    Route::get('/tugassekolah', [App\Http\Controllers\Api\Web\TugassekolahController::class, 'index']);
    Route::put('/tugassekolah/update/{tugassekolah}', [App\Http\Controllers\Api\Web\TugassekolahController::class, 'update']);
    Route::get('/tugassekolah/{id}', [App\Http\Controllers\Api\Web\TugassekolahkController::class, 'show']);
    Route::delete('/tugassekolah/delete/{tugassekolah}', [App\Http\Controllers\Api\Web\TugassekolahkController::class, 'destroy']);

    Route::get('/siswa', [App\Http\Controllers\Api\Web\SiswaController::class, 'index']);
    Route::get('/siswa/{id}', [App\Http\Controllers\Api\Web\SiswaController::class, 'show']);
    Route::post('/siswa/input', [App\Http\Controllers\Api\Web\SiswaController::class, 'store']);
    Route::put('/siswa/update/{siswa}', [App\Http\Controllers\Api\Web\SiswaController::class, 'update']);
    Route::delete('/siswa/delete/{siswa}', [App\Http\Controllers\Api\Web\SiswaController::class, 'destroy']);

    Route::get('/penerbit', [App\Http\Controllers\Api\Web\PenerbitController::class, 'index']);
    Route::post('/penerbit/input', [App\Http\Controllers\Api\Web\PenerbitController::class, 'store']);
    Route::get('/penerbit/{id}', [App\Http\Controllers\Api\Web\PenerbitController::class, 'show']);
    Route::put('/penerbit/update/{penerbit}', [App\Http\Controllers\Api\Web\PenerbitController::class, 'update']);
    Route::delete('/penerbit/delete/{penerbit}', [App\Http\Controllers\Api\Web\PenerbitController::class, 'destroy']);


    Route::get('/jurusan', [App\Http\Controllers\Api\Web\JurusanController::class, 'index']);
    Route::post('/jurusan/input', [App\Http\Controllers\Api\Web\JurusanController::class, 'store']);
    Route::get('/jurusan/{id}', [App\Http\Controllers\Api\Web\JurusanController::class, 'show']);
    Route::put('/jurusan/update/{jurusan}', [App\Http\Controllers\Api\Web\JurusanController::class, 'update']);
    Route::delete('/jurusan/delete/{jurusan}', [App\Http\Controllers\Api\Web\JurusanController::class, 'destroy']);

    Route::get('/jadwal_pelajaran', [App\Http\Controllers\Api\Web\Jadwal_PelajaranController::class, 'index']);
    Route::post('/jadwal_pelajaran/input', [App\Http\Controllers\Api\Web\Jadwal_PelajaranController::class, 'store']);
    Route::get('/jadwal_pelajaran/{id}', [App\Http\Controllers\Api\Web\Jadwal_PelajaranController::class, 'show']);
    Route::put('/jadwal_pelajaran/update/{jadwal_pelajaran}', [App\Http\Controllers\Api\Web\Jadwal_PelajaranController::class, 'update']);
    Route::delete('/jadwal_pelajaran/delete/{jadwal_pelajaran}', [App\Http\Controllers\Api\Web\Jadwal_PelajaranController::class, 'destroy']);

    Route::get('/kalender_event', [App\Http\Controllers\Api\Web\Kalender_eventController::class, 'index']);
    Route::post('/kalender_event/input', [App\Http\Controllers\Api\Web\Kalender_eventController::class, 'store']);
    Route::get('/kalender_event/{id}', [App\Http\Controllers\Api\Web\Kalender_eventController::class, 'show']);
    Route::put('/kalender_event/update/{kalender_event}', [App\Http\Controllers\Api\Web\Kalender_eventController::class, 'update']);
    Route::delete('/kalender_event/delete/{id}', [App\Http\Controllers\Api\Web\Kalender_eventController::class, 'destroy']);

    Route::get('/tabungan', [App\Http\Controllers\Api\Web\TabunganController::class, 'index']);
    Route::post('/tabungan/input', [App\Http\Controllers\Api\Web\TabunganController::class, 'store']);
    Route::get('/tabungan/{id}', [App\Http\Controllers\Api\Web\TabunganController::class, 'show']);
    Route::put('tabungan/update/{tabungan}', [App\Http\Controllers\Api\Web\TabunganController::class, 'update']);
    Route::delete('/tabungan/delete/{id}', [App\Http\Controllers\Api\Web\TabunganController::class, 'destroy']);

    Route::post('/penulis/input', [App\Http\Controllers\Api\Web\PenulisController::class, 'store']);
    Route::get('/penulis', [App\Http\Controllers\Api\Web\PenulisController::class, 'index']);
    Route::put('/penulis/update/{penulis}', [App\Http\Controllers\Api\Web\PenulisController::class, 'update']);
    Route::delete('/penulis/delete/{penulis}', [App\Http\Controllers\Api\Web\PenulisController::class, 'destroy']);
    Route::get('/penulis/{id}', [App\Http\Controllers\Api\Web\PenulisController::class, 'show']);

    Route::post('/kelasjurusan_ta/input', [App\Http\Controllers\Api\Web\Kelasjurusan_taController::class, 'store']);
    Route::get('/kelasjurusan_ta', [App\Http\Controllers\Api\Web\Kelasjurusan_taController::class, 'index']);
    Route::put('/kelasjurusan_ta/update/{kelasjurusan_ta}', [App\Http\Controllers\Api\Web\Kelasjurusan_taController::class, 'update']);
    Route::delete('/kelasjurusan_ta/delete/{kelasjurusan_ta}', [App\Http\Controllers\Api\Web\Kelasjurusan_taController::class, 'destroy']);
    Route::get('/kelasjurusan_ta/{id}', [App\Http\Controllers\Api\Web\Kelasjurusan_taController::class, 'show']);

    Route::post('/catatan/input', [App\Http\Controllers\Api\Web\CatatanController::class, 'store']);
    Route::get('/catatan', [App\Http\Controllers\Api\Web\CatatanController::class, 'index']);
    Route::put('/catatan/update/{catatan}', [App\Http\Controllers\Api\Web\CatatanController::class, 'update']);
    Route::delete('/catatan/delete/{catatan}', [App\Http\Controllers\Api\Web\CatatanController::class, 'destroy']);
    Route::get('/catatan/{id}', [App\Http\Controllers\Api\Web\CatatanController::class, 'show']);

    Route::post('/absen/input', [App\Http\Controllers\Api\Web\AbsenController::class, 'store']);
    Route::get('/absen', [App\Http\Controllers\Api\Web\AbsenController::class, 'index']);
    Route::put('/absen/update/{absen}', [App\Http\Controllers\Api\Web\AbsenController::class, 'update']);
    Route::delete('/absen/delete/{asben}', [App\Http\Controllers\Api\Web\AbsenController::class, 'destroy']);
    Route::get('/absen/{id}', [App\Http\Controllers\Api\Web\AbsenController::class, 'show']);

});