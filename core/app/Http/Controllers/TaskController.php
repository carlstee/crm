<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::orderBy('id', 'DESC')->paginate(5);
        return view('backend.task.task',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::all();
        return view('backend.task.add-task',compact('employee'));
    }

    public function employeeAdd(Request $request)
    {
        $id = $request->id;
        $employee = Employee::where('name',$id)->get();

        $output ="";

        foreach($employee as $value){
            $output .= '<option value="'.$value->email.'">'.$value->employee_id.'</option>';
        }
        echo $output;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $this->validate($request,array(
            'employee_name' => 'required',
            'employee_Id' => 'required',
            'task_name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ));

        $task = new Task;
        $task->employee_name = $request->employee_name;
        $task->employee_Id = $request->employee_Id;
        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->save();
        return redirect('admin/employee/task')->withMsg('Task Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $user = Auth::guard('employee')->user()->email;
        $task_manage = Task::where('employee_Id', $user)->orderBy('id', 'DESC')->paginate(5);
        return view('users.task.task', compact('task_manage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, $id)
    {
        return redirect()->back()->withdelmsg('Demo Version,Change Not Possible');
        $task = Task::find($id);
        $task->delete();
        return back()->withMsg('Removed Successfully');
    }
}
