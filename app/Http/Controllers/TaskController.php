<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
   $tasks = Task::orderBy('created_at')->get();
     return view('tasks.index',compact('tasks'));
    }

    public function show($id){
     $task = Task::where('id',$id)->get();
        return view('tasks.show',compact('task'));
    }

    public function store(Request $request){
        $request->validate([
          'name' => 'required|max:255',
        ]);

        $task = new Task();
        $task->name = $request->name ;
        $task->save();

        return redirect()->back();
    }

    public function destory($id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function edit($id){

        $edit = Task::find($id);
        $tasks = Task::orderBy('created_at')->get();
        return view('tasks.edit',compact('tasks','edit'));

    }
    public function update(Request $request,$id){

        $t = Task::find($id);
        $t->name = $request->name;
        $t->updated_at = now();
        $t->save();

        return redirect('/');
    }


    
}
