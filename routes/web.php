<?php

use App\Http\Controllers\AddMenuController;
use App\Http\Controllers\AkuntingController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\CMAboutController;
use App\Http\Controllers\CMActivityController;
use App\Http\Controllers\CmDashController;
use App\Http\Controllers\CMDataHrisController;
use App\Http\Controllers\CMDialogController;
use App\Http\Controllers\CMDirectSupplyController;
use App\Http\Controllers\CMEditDataKaryawanController;
use App\Http\Controllers\CMLogKreditController;
use App\Http\Controllers\CMWAKontakController;
use App\Http\Controllers\CogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DFRMobileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoncatClsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MsAdjustController;
use App\Http\Controllers\MsBukutamuController;
use App\Http\Controllers\MsCmSettingMejaController;
use App\Http\Controllers\MSCompareController;
use App\Http\Controllers\MsVerificationController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PTSController;
use App\Http\Controllers\ReportOrderBrgController;
use App\Http\Controllers\StockTakeController;
use App\Http\Controllers\SuaraKaryawanController;
use App\Http\Controllers\TicketingController;
use App\Http\Controllers\ViewSOPController;
use Illuminate\Support\Facades\Route;

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
Route::get('/logout', function () {
    return redirect()->route('logout');
});
Route::post('loginApp', [LoginController::class, 'setlogin'])->name('loginApp');

Route::group(['middleware' => ['auth']],
    function () {
        Route::get('/', function () {
            return redirect('msbukutamu');
        });

//MS Bukutamu
        Route::get('msbukutamu', [MsBukutamuController::class, 'msbukutamu'])->name('msbukutamu');
        Route::post('contacttamu', [MsBukutamuController::class, 'contacttamu'])->name('contacttamu');
        Route::get('main', [MainController::class, 'main'])->name('main');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::post('dashboard_addlstmenu', [DashboardController::class, 'dashboard_addlstmenu'])->name('dashboard_addlstmenu');

    });

//TUTUP MS Bukutamu
Route::get('direct_msbukutamu', [MsBukutamuController::class, 'direct_msbukutamu'])->name('direct_msbukutamu');
// MASTER
Route::get('master', [MasterController::class, 'master'])->name('master');
Route::post('master_gantiimei', [MasterController::class, 'master_gantiimei'])->name('master_gantiimei');
Route::post('master_resetpass', [MasterController::class, 'master_resetpass'])->name('master_resetpass');
Route::get('presence', [PresenceController::class, 'presence'])->name('presence');
Route::post('presence_periode', [PresenceController::class, 'presence_periode'])->name('presence_periode');

Route::get('jadwal', [JadwalController::class, 'jadwal'])->name('jadwal');
Route::get('kontak', [KontakController::class, 'kontak'])->name('kontak');

// Non Aplikasi Champs-Mobile
Route::get('akunting', [AkuntingController::class, 'akunting'])->name('akunting');
Route::post('akunting_cekvoucher', [AkuntingController::class, 'akunting_cekvoucher'])->name('akunting_cekvoucher');

// MS
Route::get('mscompare', [MSCompareController::class, 'mscompare'])->name('mscompare');
Route::post('mscompare_cek', [MSCompareController::class, 'mscompare_cek'])->name('mscompare_cek');
Route::post('mscompare_resync', [MSCompareController::class, 'mscompare_resync'])->name('mscompare_resync');
//CM About
Route::get('cri_profiel', [CMAboutController::class, 'cri_profiel'])->name('cri_profiel');
Route::get('cri_about', [CMAboutController::class, 'cri_about'])->name('cri_about');
Route::get('cri_underdevlopment', [CMAboutController::class, 'cri_underdevlopment'])->name('cri_underdevlopment');
//CM Buku Tamu
Route::get('repot_bt', [BukuTamuController::class, 'repot_bt'])->name('repot_bt');
//CM Report OrderBarang Khusus MS
Route::get('repot_ob', [ReportOrderBrgController::class, 'repot_ob'])->name('repot_ob');
// CM COGS
Route::get('viewcogs', [CogsController::class, 'viewcogs'])->name('viewcogs');
// CM StockTake
Route::get('rptstkcc', [StockTakeController::class, 'rptstkcc'])->name('rptstkcc');
Route::get('exportstkcc', [StockTakeController::class, 'exportstkcc'])->name('exportstkcc');
Route::get('importviewstkcc', [StockTakeController::class, 'importviewstkcc'])->name('importviewstkcc');
Route::post('importstkcc', [StockTakeController::class, 'importstkcc'])->name('importstkcc');
Route::post('simpanimprt', [StockTakeController::class, 'simpanimprt'])->name('simpanimprt');
// CM Loncat CLS MS
Route::get('loncat', [LoncatClsController::class, 'loncat'])->name('loncat');
// CM Modal dashboard
Route::get('cmdash', [CmDashController::class, 'cmdash'])->name('cmdash');
// CM DFRMobileController
Route::get('dfr_mobile', [DFRMobileController::class, 'dfr_mobile'])->name('dfr_mobile');
Route::post('dfrdet', [DFRMobileController::class, 'dfrdet'])->name('dfrdet');
Route::post('dfrmenuterjual', [DFRMobileController::class, 'dfrmenuterjual'])->name('dfrmenuterjual');
//CM View SOP
Route::get('viewsop', [ViewSOPController::class, 'viewsop'])->name('viewsop');
//CM View SOP
Route::get('CMEditKaryawan', [CMEditDataKaryawanController::class, 'CMEditKaryawan'])->name('CMEditKaryawan');
Route::post('submit_pengajuan', [CMEditDataKaryawanController::class, 'submit_pengajuan'])->name('submit_pengajuan');
// CM Dialog
Route::get('cm_dashsaran', [CMDialogController::class, 'cm_dashsaran'])->name('cm_dashsaran');
Route::get('cm_dashsaranHistory', [CMDialogController::class, 'cm_dashsaranHistory'])->name('cm_dashsaranHistory');
Route::post('submit_dashsaran', [CMDialogController::class, 'submit_dashsaran'])->name('submit_dashsaran');
// Suara Karyawan
Route::get('suara_krwn', [SuaraKaryawanController::class, 'suara_krwn'])->name('suara_krwn');
// CM Ms Setting Meja
Route::get('msetmeja', [MsCmSettingMejaController::class, 'msetmeja'])->name('msetmeja');
Route::post('sbt_updtsetmja', [MsCmSettingMejaController::class, 'sbt_updtsetmja'])->name('sbt_updtsetmja');
// CM Dash Log Kredit
Route::get('dashlogkredit', [CMLogKreditController::class, 'dashlogkredit'])->name('dashlogkredit');
Route::post('submit_upket', [CMLogKreditController::class, 'submit_upket'])->name('submit_upket');
// CM Adjust MS

Route::get('masteradjust', [MsAdjustController::class, 'masteradjust'])->name('masteradjust');
Route::get('adjustms', [MsAdjustController::class, 'adjustms'])->name('adjustms');
Route::post('submit_adjust', [MsAdjustController::class, 'submit_adjust'])->name('submit_adjust');
Route::get('adjustds', [MsAdjustController::class, 'adjustds'])->name('adjustds');
Route::post('dltadjust_kodtrm', [MsAdjustController::class, 'dltadjust_kodtrm'])->name('dltadjust_kodtrm');
Route::get('masterswitch', [MsAdjustController::class, 'masterswitch'])->name('masterswitch');
Route::post('submit_switchms', [MsAdjustController::class, 'submit_switchms'])->name('submit_switchms');
Route::post('adjst_loncatclosing', [MsAdjustController::class, 'adjst_loncatclosing'])->name('adjst_loncatclosing');
Route::post('submit_tmbhbrgms', [MsAdjustController::class, 'submit_tmbhbrgms'])->name('submit_tmbhbrgms');
// CM Activity
Route::get('cmactivity', [CMActivityController::class, 'cmactivity'])->name('cmactivity');
Route::post('submit_tmbhactivty', [CMActivityController::class, 'submit_tmbhactivty'])->name('submit_tmbhactivty');
Route::post('submit_editactivty', [CMActivityController::class, 'submit_editactivty'])->name('submit_editactivty');
// CM Direct Supply
Route::get('dashdirecsupply', [CMDirectSupplyController::class, 'dashdirecsupply'])->name('dashdirecsupply');
Route::get('dashdirecsupply', [CMDirectSupplyController::class, 'dashdirecsupply'])->name('dashdirecsupply');
// CM HRIS
Route::get('CMHris', [CMDataHrisController::class, 'CMHris'])->name('CMHris');
Route::get('CMHris_Pendidikan', [CMDataHrisController::class, 'CMHris_Pendidikan'])->name('CMHris_Pendidikan');
Route::get('CMHris_Pengalaman', [CMDataHrisController::class, 'CMHris_Pengalaman'])->name('CMHris_Pengalaman');
Route::get('CMHris_KartuKeluarga', [CMDataHrisController::class, 'CMHris_KartuKeluarga'])->name('CMHris_KartuKeluarga');
Route::get('CMHris_PPK', [CMDataHrisController::class, 'CMHris_PPK'])->name('CMHris_PPK');
Route::post('tmbhpendidikan', [CMDataHrisController::class, 'tmbhpendidikan'])->name('tmbhpendidikan');
Route::post('tmbhpenglaman', [CMDataHrisController::class, 'tmbhpenglaman'])->name('tmbhpenglaman');
Route::post('tmbhkk', [CMDataHrisController::class, 'tmbhkk'])->name('tmbhkk');
Route::post('btlknppk', [CMDataHrisController::class, 'btlknppk'])->name('btlknppk');
Route::post('simpan_ppk', [CMDataHrisController::class, 'simpan_ppk'])->name('simpan_ppk');
Route::post('updateppk', [CMDataHrisController::class, 'updateppk'])->name('updateppk');

// CARI Karyawan
Route::get('caricri', [CMDataHrisController::class, 'caricri'])->name('caricri');
Route::post('cari_krwnbynip', [CMDataHrisController::class, 'cari_krwnbynip'])->name('cari_krwnbynip');
// CM WA Kontak
Route::get('cmwakontak', [CMWAKontakController::class, 'cmwakontak'])->name('cmwakontak');
// CM Verification
Route::get('msverification', [MsVerificationController::class, 'msverification'])->name('msverification');
// PTS
Route::get('pts_approvalqa', [PTSController::class, 'pts_approvalqa'])->name('pts_approvalqa');
Route::post('pts_approvalqadet', [PTSController::class, 'pts_approvalqadet'])->name('pts_approvalqadet');
Route::post('simpan_approval', [PTSController::class, 'simpan_approval'])->name('simpan_approval');

//addmenu
Route::get('viewAddMenu', [AddMenuController::class, 'viewAddMenu'])->name('viewAddMenu');
Route::get('viewAlertMenu', [AddMenuController::class, 'viewAlertMenu'])->name('viewAlertMenu');
Route::post('updatemenu', [AddMenuController::class, 'updatemenu'])->name('updatemenu');
Route::post('histmenu', [AddMenuController::class, 'histmenu'])->name('histmenu');

// ticketing
Route::post('simpan_ticketing', [TicketingController::class, 'simpan_ticketing'])->name('simpan_ticketing');
Route::get('ticketing', [TicketingController::class, 'ticketing'])->name('ticketing');
Route::post('openticket', [TicketingController::class, 'openticket'])->name('openticket');
Route::get('datatujuan', [TicketingController::class, 'datatujuan'])->name('datatujuan');
Route::post('simpan_rating', [TicketingController::class, 'simpan_rating'])->name('simpan_rating');
Route::get('ambiltgl', [TicketingController::class, 'ambiltgl'])->name('ambiltgl');
Route::get('reminder', [TicketingController::class, 'reminder'])->name('reminder');

// backend
Route::post('simpan_ubahstatus', [BackendController::class, 'simpan_ubahstatus'])->name('simpan_ubahstatus');
Route::get('backend', [BackendController::class, 'backend'])->name('backend');
Route::post('openticketbe', [BackendController::class, 'openticketbe'])->name('openticketbe');
Route::get('ambiltgl2', [BackendController::class, 'ambiltgl2'])->name('ambiltgl2');
Route::post('simpan_kategori', [BackendController::class, 'simpan_kategori'])->name('simpan_kategori');
Route::post('hapus_kategori', [BackendController::class, 'hapus_kategori'])->name('hapus_kategori');
Route::post('nipeska', [BackendController::class, 'nipeska'])->name('nipeska');
Route::post('simpaneskalasi', [BackendController::class, 'simpaneskalasi'])->name('simpaneskalasi');
Auth::routes();
