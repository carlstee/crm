<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteInfoFormValidation;
use App\Siteinfo;
use App\SocialManagement;
use App\SupportBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class SiteInfoController extends Controller
{
    public function index(){
        $site_info = Siteinfo::find(1);
        if($site_info == ""){
            $data =[
                'title'=>'This is a demo title',
                'copyright_text'=>'© 2017 Demo Site. All rights reserved.',
                'logo'=>'png',
                'fevicon'=>'png',
                'meta_description'=>'Demo Meta Description',
                'meta_keyword'=>'Demo Meta Keyword',
            ];
            Siteinfo::create($data);
        }

        $support_bar = SupportBar::find(1);
        if($support_bar == ""){
            $data = [
                'contact_icon' => 'phone',
                'phone_number' => '12345678910',
                'service_time_icon' => 'clock',
                'service_time' => '9.00 am - 5.00 pm'
            ];
            SupportBar::create($data);
        }

        $page_title = "Site Info Management";

        $color = DB::table('color_picker')->where('id',1)->first();

        if($color == ""){
            $data = [ 'color_code' => "2ECC71" ];
            DB::table('color_picker')->insert($data);
        }

         $site_info_all_query = $this->CallRaw("site_info_manament");

        return view('backend.site-info.index',
            compact(
                'page_title',
                'site_info',
                'support_bar',
                'social_management',
                'site_info_all_query'
            )
        );
    }
    public function store(Request $request){
        $this->validate($request,[
           'site_title' => 'required|max:191',
            'meta_keyword' => 'required',
            'meta_description'=> 'required',
            'copyright_text'=> 'required | max:191'
        ]);
        $site_info = Siteinfo::where('id',1)->first();

        $old_logo = $site_info->logo;
        $old_favicon = $site_info->fevicon;

        $logo = $request->logo_picture;
        $favicon = $request->fevicon_picture;


        if ($logo) {
            $ext = strtolower($logo->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_logo;
            } else {
                if (file_exists("assets/frontend/upload/images/site-info/logo.{$old_logo}")) {
                    unlink("assets/frontend/upload/images/site-info/logo.{$old_logo}");
                }
                $image_resize = Image::make($logo->getRealPath());
                $image_resize->resize(300, 100);
                $image_resize->save("assets/frontend/upload/images/site-info/logo." .$ext);

            }
        }else{
            $ext = $old_logo;
        }

        if ($favicon) {
            $favicon_ext = strtolower($favicon->getClientOriginalExtension());
            ImageCheck($favicon_ext);
            if ($favicon_ext == "") {
                $favicon_ext = $old_favicon;
            } else {
                if (file_exists("assets/frontend/upload/images/site-info/favicon.{$old_favicon}")) {
                    unlink("assets/frontend/upload/images/site-info/favicon.{$old_favicon}");
                }
                $image_resize = Image::make($favicon->getRealPath());
                $image_resize->resize(20, 20);
                $image_resize->save("assets/frontend/upload/images/site-info/favicon." .$favicon_ext);
            }
        }else{
            $favicon_ext = $old_favicon;
        }
        $data =[
            'title'=> $request->site_title,
            'copyright_text'=> $request->copyright_text,
            'logo'=> $ext,
            'fevicon'=>$favicon_ext,
            'meta_description'=> $request->meta_description,
            'meta_keyword'=> $request->meta_keyword,
        ];
        Siteinfo::where('id',1)->update($data);

        return redirect()->back()->withMsg("General Setting Updated Successfully");

    }
    public function support_store(SiteInfoFormValidation $request){
        $data = [
            'contact_icon' => $request->contact_icon,
            'phone_number' => $request->phone_number,
            'service_time_icon' => $request->service_time_icon,
            'service_time' => $request->service_time
        ];
        $on_off_switch = $request->status;

        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }

        SupportBar::where('id',1)->update($data);

        return redirect()->back()->withMsg("Support Bar Settings Updated Successfully");
    }
    public function Color_changer(Request $request){

        $data = [ 'color_code' => $request->code];

        DB::table('color_picker')->where('id',1)->update($data);

        return "Site Color Change Successfully";
    }

    public static function CallRaw($procName, $parameters = null, $isExecute = false) {
        $syntax = '';
        for ($i = 0; $i < count($parameters); $i++) {
            $syntax .= (!empty($syntax) ? ',' : '') . '?';
        }
        $syntax = 'CALL ' . $procName . '(' . $syntax . ');';

        $pdo = DB::connection()->getPdo();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
        $stmt = $pdo->prepare($syntax, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
        for ($i = 0; $i < count($parameters); $i++) {
            $stmt->bindValue((1 + $i), $parameters[$i]);
        }
        $exec = $stmt->execute();
        if (!$exec)
            return $pdo->errorInfo();
        if ($isExecute)
            return $exec;

        $results = [];
        do {
            try {
                $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);
            } catch (\Exception $ex) {

            }
        } while ($stmt->nextRowset());


        if (1 === count($results))
            return $results[0];
        return $results;
    }


}
