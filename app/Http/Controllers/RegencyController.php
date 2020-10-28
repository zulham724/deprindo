<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regency;
use App\Province;

class RegencyController extends Controller
{
    public function index()
    {
        $provinces = Province::pluck('name', 'id');

        // return view('dependent-dropdown.index', [
        //     'provinces' => $provinces,
        // ]);
        return $provinces;
    }
    public function store(Request $request)
    {
        $cities = Regency::where('province_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($cities);
    }
}
