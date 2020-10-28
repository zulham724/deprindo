<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Province;
use App\Regency;
use App\PartnerCategory;
use App\Configuration;
use App\Management;

class Navigation {
    public static function set_active($path, $active = 'active') {

        return call_user_func_array('Request::is', (array)$path) ? $active : '';

    }

    public static function list_province() {

        return Province::get();

    }
    public static function list_regency($province_id) {

        return Regency::get();

    }

    public static function list_partnercategory($id) {

        return PartnerCategory::where('type',$id)->get();

    }

    public static function ref_partnercategory($id) {

        return PartnerCategory::where('id',$id)->first();

    }

    public static function config() {

        return Configuration::first();

    }

    public static function random_management($type) {
        // if($type == 'dpp'){
        //     return Management::where('type',$type)->limit(4)->get();
        // }else{
            return Management::where('type',$type)->inRandomOrder()->limit(4)->get();
        // }

    }
}
