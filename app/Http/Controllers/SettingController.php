<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    //
    public function index(){
        $id = 1;
        $objs = setting::find($id);
        $data['objs'] = $objs;
        return view('admin.setting.index', $data);
    }


    public function post_setting(Request $request){

        $img = DB::table('settings')
          ->where('id', 1)
          ->first();

          $image = $request->file('facebook_image');
          $image2 = $request->file('banner_his');
          
          $filename = null;
          $filename2 = null;
          $id = 1;

          if($image2){

            $path = 'media/';
                $filename2 = time().'.'.$image2->getClientOriginalExtension();
                $image2->move($path, $filename2);

              $objsx = setting::find($id);
            $objsx->banner_his = $filename2;
            $objsx->save();

          }
         

          if($image){

            $path = 'media/';
                $filename = time().'.'.$image->getClientOriginalExtension();
                $image->move($path, $filename);

              $objs = setting::find($id);
            $objs->facebook_image = $filename;
            $objs->save();

          }

            $objs = setting::find($id);
            $objs->name_website = $request['name_website'];
            $objs->facebook = $request['facebook'];
            $objs->facebook_url = $request['facebook_url'];
            $objs->facebook_title = $request['facebook_title'];
            $objs->facebook_detail = $request['facebook_detail'];
            $objs->line_oa = $request['line_oa'];
            $objs->line_oa_url = $request['line_oa_url'];
            $objs->phone = $request['phone'];
            $objs->email = $request['email'];
            $objs->google_analytic = $request['google_analytic'];
            $objs->save();

          

            return redirect(url('admin/setting/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


}
