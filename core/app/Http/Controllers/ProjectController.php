<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function createProject()
    {
        return view('backend.project.add_project');
    }

    public function indexProject()
    {
        $project = Project::orderBy('id', 'desc')->paginate(15);
        return view('backend.project.project_list', compact('project'));
    }

    public function editProject($id)
    {
        $project = Project::find($id);
        return view('backend.project.edit_project', compact('project'));
    }

    public function storeProject(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'project_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'budget' => 'required',
            'advance' => 'required',
            'due' => 'required',
            'description' => 'required',
        ]);

        $project_id = Project::create([
           'project_name' => $request->project_name,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date,
           'budget' => $request->budget,
           'advance' => $request->advance,
           'due' => $request->due,
           'description' => $request->description,
        ])->id;

        $filenamearr = [];

        for($i = 0; $i < count($request->file);)
        {
            $ext = strtolower($request->file[$i]->getClientOriginalExtension()) ;

            if ( $ext != 'doc' && $ext != 'pdf' && $ext!= 'docx')
            {
                return redirect()->back()->withErrors('File Type Not Matched');

            }else{
                $file = $request->file[$i];
                $filename = rand() . '.' . $ext;
                $file->move('assets/project/', $filename);

                array_push($filenamearr,$filename );
            }
            $i++;
        };

        if ($filenamearr != '')
        {
            foreach ($filenamearr as $data)
            {
                ProjectFile::create([
                    'project_id' => $project_id,
                    'file' => $data
                ]);
            }
        }
        return redirect()->back()->withmsg('Successfully Created');
    }

    public function deleteProject($id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        Project::find($id)->delete();
        ProjectFile::where('project_id', $id)->delete();
        return redirect()->back()->withmsg('Successfully Deleted');
    }

    public function delDocProject(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $id = $request->desing_id;
        $p = ProjectFile::destroy($id);
        return $p;
    }

    public function updateProject(Request $request , $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,[
            'project_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'budget' => 'required',
            'advance' => 'required',
            'due' => 'required',
            'description' => 'required',
        ]);

        Project::whereId($id)
        ->update([
            'project_name' => $request->project_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'budget' => $request->budget,
            'advance' => $request->advance,
            'due' => $request->due,
            'description' => $request->description,
        ]);

        ProjectFile::where('project_id', $id)->delete();

        $filenamearr = [];

        for($i = 0; $i < count($request->file);)
        {
            $ext = strtolower($request->file[$i]->getClientOriginalExtension()) ;

            if ( $ext != 'doc' && $ext != 'pdf' && $ext!= 'docx' && $ext!= '')
            {
                return redirect()->back()->withErrors('File Type Not Matched');

            }else{
                $file = $request->file[$i];
                $filename = rand() . '.' . $ext;
                $file->move('assets/project/', $filename);

                array_push($filenamearr,$filename );
            }
            $i++;
        };

        if ($filenamearr != '')
        {
            foreach ($filenamearr as $data)
            {
                ProjectFile::create([
                    'project_id' => $id,
                    'file' => $data
                ]);
            }
        }
        return redirect('admin/projects')->withmsg('Successfully Updated');

    }

}
