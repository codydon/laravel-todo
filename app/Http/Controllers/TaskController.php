<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
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
        return view("inputing");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->tasks=$request->input('tasking');
        $task->save();
        $retrive= Task::all();
        return view('input')->with('retrive',$retrive);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $store = Task::all();
       // return view('input', ['store'=>$store,'task'=>$task, 'layout'=>'show']);
       //echo $task;
       
       echo $store;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //$task = Task::find($id);
        $retrive= DB::table('store')
        ->select('id','tasks')
        ->where(['id' => Auth::id()])
        ->get();
        return view('edit')->with('retrive',$retrive);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $tasking = $request->input('tasking'); 
           
            DB::update('update store set tasking = ?, where id = ?',[$tasking,$id]);
            
            $retrive= Task::all();
            return view('input')->with('retrive',$retrive);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        $retrive= Task::all();
        return view('input')->with('retrive',$retrive);
    }
}
