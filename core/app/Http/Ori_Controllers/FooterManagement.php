<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterManagement extends Controller
{
    public function index(){

        $page_title = "Footer Management";
        $all_category = Category::all();
        //$category_widget = DB::table('category_widget')->get();
        $about_widget = DB::table('about_widget')->where('id',1)->first();
        if($about_widget == ""){
            $data = [
                'content' => 'Wire something about your company',
                'status'  => 'on'
            ];
            DB::table('about_widget')->insert($data);
            $about_widget = DB::table('about_widget')->where('id',1)->first();
        }
        $recent_post = DB::table('recent_post_widget')->where('id',1)->first();
        if($recent_post == ""){
            $data = [
                'count' => 5,
                'status'  => 'on'
            ];
            DB::table('recent_post_widget')->insert($data);
            $recent_post = DB::table('recent_post_widget')->where('id',1)->first();
        }
        $feedback = DB::table('feedback')->where('id',1)->first();
        if($feedback == ""){
            $data = [
                'status'  => 'on'
            ];
            DB::table('feedback')->insert($data);
            $feedback = DB::table('feedback')->where('id',1)->first();
        }
        $all_useful_links = DB::table('useful_links')->get();
            $footer_data = $this->CallRaw('footer_manament');
        return  view('backend.footer-management.index',
            compact(
                'page_title',
                'about_widget',
                'all_category',
                'recent_post',
                'feedback',
                'all_useful_links',
                'footer_data'
            )
        );
    }
    public function about_widget(Request $request){

        $this->validate($request,[
           'about_widget' => 'required'
        ]);
        $data = [
            'content' => $request->about_widget,
            'status'  => $request->status
        ];
        DB::table('about_widget')->where('id',1)->update($data);

        return redirect()->back()->withMsg("About Widget Updated Successfully");
    }
    /**==========================
     Useful Link Widget insert
     =========================**/

    public function useful_links_widget(Request $request){
        $this->validate($request,[
           'name' => 'required | max:191 | unique:useful_links',
           'icon' => 'required | max: 191',
           'url'  => 'required | max:191 | unique:useful_links'
        ]);
        $data = [
          'name' => $request->name,
          'icon' => $request->icon,
          'url'  => $request->url
        ];
        DB::table('useful_links')->insert($data);
    //return $request->all();
       return redirect()->back()->withMsg("Useful Links Widget Inserted Successfully");
    }

    public function recent_post_widget(Request $request){
        $this->validate($request,[
           'recent_post_count'  => 'required| max:191',
            'status' => 'nullable|max:191'
        ]);
        $data = [
          'count' => $request->recent_post_count
        ];
        $on_off_switch = $request->status;

        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }

        DB::table('recent_post_widget')->where('id',1)->update($data);

        return redirect()->back()->withMsg("Recent Post Widget Updated Successfully");
    }
    public function feedback_widget(Request $request){
        $data =[];
        $on_off_switch = $request->status;
        if($on_off_switch != null){
            $switch_value = ['status'=>$request->status];

            $data =  array_merge($data, $switch_value);
        }
        DB::table('feedback')->where('id',1)->update($data);
        return redirect()->back()->withMsg("Feedback Widget Updated Successfully");
    }
    public function useful_links_update(Request $request){
        $this->validate($request,[
            'name' => 'required | max:191 | unique:useful_links',
            'icon' => 'required | max: 191',
            'url'  => 'required | max:191 | unique:useful_links'
        ]);
        $data = [
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url
        ];

        DB::table('useful_links')->where('id',$request->id)->update($data);

        return response()->json();
    }
    public function useful_links_delete(Request $request){
        DB::table('useful_links')->where('id',$request->id)->delete();
        return response()->json();
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
