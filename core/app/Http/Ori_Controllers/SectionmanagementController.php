<?php

namespace App\Http\Controllers;

use App\HomePageManagement;
use App\Http\Requests\SidebarValidation;
use App\WidgetManagement;
use Illuminate\Http\Request;

class SectionmanagementController extends Controller
{
    public function index(){
        $home_page_manage = HomePageManagement::find(1);
        if($home_page_manage == ""){
            $data = [
                'header_section' => "on",
                'featured_section' => "on",
                'category_section' => "on",
                'recent_items' => "on",
                'team_section' => "on",
                'countdown_section' => "on",
                'popular_items' => "on",
            ];
            HomePageManagement::create($data);
            $home_page_manage = HomePageManagement::find(1);
        }
        $widget_management = WidgetManagement::find(1);
        if($widget_management == ""){
            $data = [
                'search' => 'on',
                'category' => "on",
                'recent_post' => 'on',
                'tag' => 'on',
                'advertisement'=> 'on'
            ];
            WidgetManagement::create($data);
            $widget_management = WidgetManagement::where('id',1)->first();
        }
        $page_title = "Home Page Section Management";
        return view('backend.section-management.index',compact('page_title','home_page_manage','widget_management'));
    }
    public function home_section(Request $request){

        $data = [
          'header_section' => $request->header_section,
          'featured_section' => $request->featured_section,
          'category_section' => $request->category_section,
          'recent_items' => $request->recent_items,
          'team_section' => $request->team_section,
          'countdown_section' => $request->countdown_section,
          'popular_items' => $request->popular_items,
        ];

        HomePageManagement::where('id',1)->update($data);

        return redirect()->back()->withMsg("Home Page Section Setting Update Successfully");
    }
    public function sidebar_widget(SidebarValidation $request){

        $data = [
            'search' => $request->search,
            'category' => $request->category,
            'recent_post' => $request->recent_post,
            'tag' => $request->tag,
            'advertisement'=> $request->advertisement
        ];

        WidgetManagement::where('id',1)->update($data);

        return redirect()->back()->withMsg("Sidebar Widget Settings Update Successfully");
    }
}
