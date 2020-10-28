<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Member;
use App\Models\User;
use App\PartnerCategory;
use App\Partner;
use App\Land;
use App\Gallery;

class DeprindoController extends Controller
{
    public function article()
    {
        $posts = DB::table('posts')->simplePaginate(5);
        return view('article',['posts'=>$posts]);
    }

    public function news()
    {
        $pages = DB::table('pages')->simplePaginate(6);
        return view('news',['pages'=>$pages]);
    }

    public function center_regulations()
    {
        $pages = DB::table('regulations')->where('type','1')->simplePaginate(5);
        return view('center-regulations',['pages'=>$pages]);
    }

    public function province_regulations(Request $request)
    {
        if($request->has('province')){
            $pages = DB::table('regulations')->where('type','2')->where('province_id',$request->get('province'))->simplePaginate(5);
        }else{
            $pages = DB::table('regulations')->where('type','2')->simplePaginate(5);
        }
        return view('province-regulations',['pages'=>$pages]);
    }

    public function regency_regulations(Request $request)
    {
        if($request->has('regency')){
            $pages = DB::table('regulations')->where('regency_id',$request->get('regency'))->simplePaginate(5);
        }else{
            $pages = DB::table('regulations')->where('type','3')->simplePaginate(5);
        }

        return view('regency-regulations',['pages'=>$pages]);
    }

    public function member_projects(Request $request)
    {
         if($request->has('regency') && $request->get('regency')!='all'){
            $pages = DB::table('projects')->where('regency_id',$request->get('regency'))->simplePaginate(6);
            $selected_prov = $request->get('province');
            $selected_reg = $request->get('regency');
        }elseif($request->has('province') && $request->get('regency')=='all'){
            $pages = DB::table('projects')->where('province_id',$request->get('province'))->simplePaginate(6);
            $selected_prov = $request->get('province');
            $selected_reg = $request->get('regency');
        }else{
            $pages = DB::table('projects')->simplePaginate(5);
            $selected_prov = '';
            $selected_reg = '';
        }

        return view('member-projects',['pages'=>$pages, 'selected_prov' => $selected_prov, 'selected_reg' => $selected_reg]);
    }

    public function galleries()
    {
        $images = DB::table('galleries')->orderBy('id', 'desc')->simplePaginate(6);
        return view('galleries',['images'=>$images]);
    }

    public function dpp_galleries()
    {
        $images = DB::table('galleries')->where('type','dpp')->orderBy('id', 'desc')->simplePaginate(6);
        return view('dpp-galleries',['images'=>$images]);
    }

    public function dpw_galleries(Request $request)
    {
        if ($request->has('province') && $request->get('province')!='all') {
            $images = Gallery::with('province')->where('type','dpw')->where('province_id',$request->get('province'))->orderBy('id', 'desc')->simplePaginate(6);
            $selected = $request->get('province');
        }else{
            $images = Gallery::with('province')->where('type','dpw')->orderBy('id', 'desc')->simplePaginate(6);
            $selected = '';
        }
        return view('dpw-galleries',['images'=>$images,'selected'=>$selected]);
    }

    public function dpd_galleries(Request $request)
    {
        if ($request->has('regency')) {
            $images = Gallery::with('regency')->where('type','dpd')->where('regency_id',$request->get('regency'))->orderBy('id', 'desc')->simplePaginate(6);
        }elseif($request->get('regency')=='all'){
            $images = Gallery::with('province')->where('type','dpd')->where('province_id',$request->get('province'))->orderBy('id', 'desc')->simplePaginate(6);
        }else{
            $images = Gallery::with('regency')->where('type','dpd')->orderBy('id', 'desc')->simplePaginate(6);
        }
        return view('dpd-galleries',['images'=>$images]);
    }

    public function submit_members(Request $request)
    {
        $member = new Member;

        $member->name = $request->name;
        $member->company = $request->company;
        $member->province_id = $request->province;
        $member->regency_id = $request->regency;
        $member->npwp = $request->npwp;
        $member->telpon = $request->telpon;
        $member->no_hp = $request->no_hp;
        $member->email = $request->email;
        $member->type_member = $request->type_member;
        
        $member->status = "2";
        $member->position = "Anggota";
        $new_member = $member->save();
        if($new_member){
            // return redirect('/member-register')->with(['success' => 'Pendaftaran Berhasil, Tunggu Review dari Admin Kami']);
            return 'Success';
        }else{
            // return redirect('/member-register')->with(['error' => 'Pendaftaran Gagal, Tunggu Review dari Admin Kami']);
            return 'ERROR!';
        }

    }

    public function partner_categories(Request $request)
    {
        $pc = PartnerCategory::where('type', $request->get('id'))->pluck('name', 'id');

        return response()->json($pc);
    }

    public function submit_partner(Request $request)
    {
        $partner = new Partner;

        $partner->leader_name = $request->name;
        $partner->company_name = $request->company;
        $partner->province_id = $request->province;
        $partner->regency_id = $request->regency;
        $partner->partner_type = $request->partner_type;
        $partner->partner_category_id = $request->partner_category;
        $partner->telephone = $request->telephone;
        $partner->no_hp = $request->no_hp;
        $partner->email = $request->email;
        $partner->status = '2';
        $new_partner = $partner->save();
        if($new_partner){
            return 'Success';
        }else{
            return 'ERROR!';
        }

    }

    public function submit_land(Request $request)
    {
        $land = new Land;

        $land->owner = $request->name;
        $land->large = $request->large;
        $land->letter = $request->letter;
        $land->price = $request->price;
        $land->type = $request->type;
        $land->province_location = $request->province_location;
        $land->regency_location = $request->regency_location;
        $land->no_hp = $request->no_hp;
        $land->email = $request->email;
        $land->status = '0';
        $new_land = $land->save();
        if($new_land){
            return 'Success';
        }else{
            return 'ERROR!';
        }

    }

    public function activate_user(Request $request)
    {
        $user = User::where('member_id',$request->id)->first();
        $member = Member::where('id',$request->id)->first();
        $pass = 'password';
        $email_exist = User::where('email',$member->email)->first();

        if(empty($user)){
            if(empty($email_exist)){
                User::create([
                        'name' => $member->name,
                        'email' => $member->email,
                        'avatar' => 'users/default.png',
                        'password' => Hash::make($pass),
                        'member_id' => $request->id
                ]);
                $user_activated = Member::find($request->id);
                $user_activated->status = '1';
                $user_activated->save();
            }else{
                return redirect(route('voyager.members.index'))->with(['message' => "Email sudah ada, mohon edit email", 'alert-type' => 'error']);

            }

        }
        return redirect(route('voyager.members.index'))->with(['message' => "Akun Berhasil Dibuat dengan Password : password", 'alert-type' => 'success']);
    }

    public function delete_user(Request $request)
    {
        $res=User::where('member_id',$request->id)->delete();
        if ($res){
            $user_deactivated = Member::find($request->id);
            $user_deactivated->status = '0';
            $user_deactivated->save();
            return redirect(route('voyager.members.index'))->with(['message' => "User Berhasil Dinonaktifkan", 'alert-type' => 'success']);
        }else{
            return redirect(route('voyager.members.index'))->with(['message' => "User Gagal Dinonaktifkan", 'alert-type' => 'error']);
        }
    }


}
