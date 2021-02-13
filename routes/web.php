<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\DeprindoController;
use Illuminate\Http\Request;
use App\Post;
use App\Page;
use App\Management;
use App\Area;

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
    return view('home');
});

Route::get('dpp-management', function () {
    $managements = Management::where('type','dpp')->get();
	return view('management',['managements' => $managements,'type'=>'DPP','longword'=>'Dewan Pimpinan Pusat']);
});
Route::get('dpw-management', function (Request $request) {
    if($request->has('province')){
        $managements = Management::where('type','dpw')->where('province_id',$request->get('province'))->get();
    }else{
        $managements = Management::where('type','dpw')->get();
    }
	return view('management',['managements' => $managements,'type'=>'DPW','longword'=>'Dewan Pimpinan Wilayah di tingkat Provinsi']);
});
Route::get('dpd-management', function (Request $request) {
    if ($request->has('regency') && $request->get('regency') != 'all') {
        $managements = Management::where('type','dpd')->where('regency_id',$request->get('regency'))->get();
    }elseif($request->get('regency')=='all'){
        $managements = Management::where('type','dpd')->where('province_id',$request->province)->get();
    } else {
        $managements = Management::where('type','dpd')->get();
    }

	return view('management',['managements' => $managements,'type'=>'DPD','longword'=>'Dewan Pimpinan Daerah di tingkat Kabupaten/Kota.']);
});
//ARTIKEL
Route::get('article', [DeprindoController::class,'article'])->name('article');
Route::get('detail-article', function (Request $request) {
    $post = Post::where('id',$request->id)->first();
	return view('detail-article',['post' => $post]);
});
Route::get('news', [DeprindoController::class,'news'])->name('news');
Route::get('detail-news', function (Request $request) {
    $post = Page::where('id',$request->id)->first();
	return view('detail-news',['post' => $post]);
});
Route::get('center-regulations', [DeprindoController::class,'center_regulations'])->name('center-regulations');
Route::get('province-regulations', [DeprindoController::class,'province_regulations'])->name('province-regulations');
Route::get('regency-regulations', [DeprindoController::class,'regency_regulations'])->name('regency-regulations');


//ANGGOTA
Route::get('members', function () {
	return view('members');
});
Route::get('member-benefits', function () {
	return view('member-benefits');
});
Route::get('member-register', function () {
	return view('member-register');
});
Route::get('member-projects', [DeprindoController::class,'member_projects'])->name('member-projects');
Route::post('/submit-members', [DeprindoController::class,'submit_members']);

//MITRA
Route::get('/list_servicepartners', [
    'as'   => 'list_servicepartners',
    'uses' => function (Request $request) {
        if($request->pc){
            $partners = App\Partner::with('partner_category','province','regency')->where('status','1')->where('partner_type','0')->where('partner_category_id', $request->pc)->orderBy('id', 'desc')->get();
        }else{
            $partners = App\Partner::with('partner_category','province','regency')->where('status','1')->where('partner_type','0')->orderBy('id', 'desc')->get();
        }
            return DataTables::of($partners)
            ->filter(function ($instance) use ($request) {
            if (!empty($request->get('province_id'))) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['province_id'], $request->get('province_id')) ? true : false;
                });
            }

            if (!empty($request->get('regency_id')) && $request->get('regency_id')!='all') {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['regency_id'], $request->get('regency_id')) ? true : false;
                });
            }
        })
        ->make(true);
    }
]);

Route::get('service-partners', function (Request $request) {
	return view('service-partners',['pc'=>$request->pc]);
});

Route::get('/list_productpartners', [
    'as'   => 'list_productpartners',
    'uses' => function (Request $request) {
        if($request->pc){
            $partners = App\Partner::with('partner_category','province','regency')->where('status','1')->where('partner_type','1')->where('partner_category_id', $request->pc)->orderBy('id', 'desc')->get();
        }else{
            $partners = App\Partner::with('partner_category','province','regency')->where('status','1')->where('partner_type','1')->orderBy('id', 'desc')->get();
        }
        return DataTables::of($partners)
            ->filter(function ($instance) use ($request) {
            if (!empty($request->get('province_id'))) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['province_id'], $request->get('province_id')) ? true : false;
                });
            }

            if (!empty($request->get('regency_id')) && $request->get('regency_id')!='all') {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['regency_id'], $request->get('regency_id')) ? true : false;
                });
            }
        })
        ->make(true);
    }
]);
Route::get('product-partners', function (Request $request) {
	return view('product-partners',['pc'=>$request->pc]);
});
Route::get('partner-register', function () {
	return view('partner-register');
});
Route::post('/submit-partner', [DeprindoController::class,'submit_partner']);


//LAHAN
Route::get('/list_lands', [
    'as'   => 'list_lands',
    'uses' => function (Request $request) {
        $lands = App\Land::with('province_loc','regency_loc')->where('status','1')->orderBy('id', 'desc')->get();
        return DataTables::of($lands)
            ->filter(function ($instance) use ($request) {
            if (!empty($request->get('province_id'))) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['province_location'], $request->get('province_id')) ? true : false;
                });
            }

            if (!empty($request->get('regency_id')) && $request->get('regency_id')!='all') {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['regency_location'], $request->get('regency_id')) ? true : false;
                });
            }
        })
        ->addColumn('letter', function($data) {
            if($data->letter == '1'){
                return 'SHM';
            }elseif($data->letter == '0'){
                return 'HGB';
            }elseif($data->letter == '2'){
                return 'AJB/Girik';
            }elseif($data->letter == '3'){
                return 'Kombinasi';
            }
        })
        ->addColumn('price', function($data) {
            return  "Rp. ".number_format($data->price,0, ',' , '.'); 
        })
        ->make(true);
    }
]);
Route::get('lands', function () {
	return view('lands');
});
Route::get('land-offer', function () {
	return view('land-offer');
});
Route::post('/submit-land', [DeprindoController::class,'submit_land']);


//GALLERY
Route::get('galleries', [DeprindoController::class,'galleries'])->name('galleries');
Route::get('dpp-galleries', [DeprindoController::class,'dpp_galleries'])->name('dpp-galleries');
Route::get('dpw-galleries', [DeprindoController::class,'dpw_galleries'])->name('dpw-galleries');
Route::get('dpd-galleries', [DeprindoController::class,'dpd_galleries'])->name('dpd-galleries');

//AJAX
Route::post('regency', [RegencyController::class,'store'])->name('regency.store');
Route::post('partner-categories', [DeprindoController::class,'partner_categories'])->name('partner-categories');
Route::post('areas',[
    'as'    => 'areas',
    'uses'  => function (Request $request)
    {
        $cities = Area::where('province_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($cities);
    }
]);
Route::get('/list_members', [
    'as'   => 'list_members',
    'uses' => function (Request $request) {
        $users = App\Member::with('province','regency')->where('status','1')->get();
        return DataTables::of($users)
            ->filter(function ($instance) use ($request) {
            if (!empty($request->get('province_id'))) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['province_id'], $request->get('province_id')) ? true : false;
                });
            }

            if (!empty($request->get('regency_id')) && $request->get('regency_id')!='all') {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['regency_id'], $request->get('regency_id')) ? true : false;
                });
            }
        })
        ->make(true);
    }
]);

//ADMIN
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('activate_user', [DeprindoController::class,'activate_user' ])->name('activate_user');
    Route::get('delete_user', [DeprindoController::class,'delete_user' ])->name('delete_user');

});

Route::get('/test',function(){
return asset('template/images/deprindo.png');
});