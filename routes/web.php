<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::match(["get", "post"], "/register", function () {
    return redirect('login');
})->name("register");


Route::group(['middleware' => ['auth', 'adminstaff']], function () {
    Route::resource('topik', 'TopikController');
    Route::resource('soal', 'SoalController');
    Route::get('list-soal/{id}', 'SoalController@list')->name('soal');
    Route::post('/images', 'SoalController@uploadImage')->name('post.image');
    Route::get('list-jawaban/{id}', 'JawabanController@list')->name('jawaban');
    Route::resource('jawaban', 'JawabanController');
    Route::resource('jadwal', 'JadwalController');
    Route::get('group/{id}', 'JadwalController@deleteGroup')->name('group.delete');
    Route::post('set-topik', 'JadwalController@setTopik')->name('jadwal.set');
    Route::delete('set-topik/{id}', 'JadwalController@setTopikDelete')->name('jadwal.setdelete');
    Route::resource('evaluasi', 'EvaluasiController');
    Route::resource('hasil', 'HasilController');
    Route::post('detail-hasil', 'HasilController@detailHasil')->name('detailHasil');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('report', 'ReportController@index')->name('report');
    Route::post('export-hasil', 'ReportController@export')->name('export-hasil');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('profil', 'ProfilController');
    Route::resource('user', 'UserController');
    Route::resource('staff', 'StaffController');
    // Route::resource('mapel', 'MapelController');
    Route::resource('guru', 'GuruController');
    Route::resource('siswa', 'SiswaController');
    Route::resource('kelas', 'KelasController');
    Route::resource('produk', 'ProdukController');
    Route::resource('diskon', 'DiskonController');
    Route::resource('pendaftar', 'CalonSiswaController');
    Route::resource('mapeltokelas', 'MapelToKelasController');
    Route::resource('setwhyus', 'WhyUsController');
    Route::resource('publish', 'PublishController');
    Route::post('/uploads', 'PublishController@uploads')->name('post.uploads');
});

Route::group(['middleware' => ['auth', 'siswa']], function () {
    Route::resource('/tryout-main', 'TryOutController');
    Route::post('/start-to', 'TryOutController@startTo')->name('start-to');
    Route::post('/lanjutkan-to', 'TryOutController@lanjutkanTo')->name('lanjutkan-to');
    Route::get('/lanjutkan-to', function () {
        return redirect('tryout-main');
    });
    Route::get('/start-to', function () {
        return redirect('tryout-main');
    });

    Route::post('/hentikan-to', 'TryOutController@hentikanTo')->name('hentikan-to');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil-guru', 'ProfilGuruController@index')->name('profil-guru');
Route::get('/sd', 'ProdukController@sd')->name('sd');
Route::get('/smp', 'ProdukController@smp')->name('smp');
Route::get('/sma', 'ProdukController@sma')->name('sma');
Route::get('/success', 'PendaftaranController@success')->name('success');
Route::resource('daftar', 'PendaftaranController');
Route::get('/discount', 'DiskonController@front')->name('discount');
Route::get('/whyus', 'WhyUsController@front')->name('whyus');
Route::get('/tryout', 'TryOutController@front')->name('tryout');
Route::get('/form-login', 'TryOutController@login')->name('form-login');

Route::post('/do_login', 'TryOutController@do_login')->name('do_login');
Route::post('/do_logout', 'TryOutController@do_logout')->name('do_logout');
Route::post('/do_login_dashboard', 'LoginController@do_login')->name('do_login_dashboard');
Route::post('/do_logout_dashboard', 'LoginController@do_logout')->name('do_logout_dashboard');
