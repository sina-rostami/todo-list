<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $tasks = Task::where('user_id', $user_id)->get();
        return view('task.index', [
            'tasks' => $tasks,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('task.create', [
            'request' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        if (date($validated['start_time']) >= date($validated['end_time']))
        {
            return view('task.create', [
                'request' => $request,
                'message' => 'Times are wrong',
            ]);
        }

        $task = New Task;
        $task->title = $validated['title'];
        $task->user_id = $request->session()->get('user_id');
        $task->start_time = $validated['start_time'];
        $task->end_time = $validated['end_time'];
        $task->is_done = false;
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view("task.edit", [
            'request' => $request,
            'task' => Task::findOrFail($id)
        ]);
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
        $validated = $request->validate([
            'title' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'is_done' => 'nullable',
        ]);

        if (date($validated['start_time']) >= date($validated['end_time']))
        {
            return view('task.edit', [
                'request' => $request,
                'task' => Task::findOrFail($id),
                'message' => 'Times are wrong',
            ]);
        }

        $validated['is_done'] = (isset($validated['is_done']) && $validated['is_done'] == "on") ? true : false;

        $task = Task::findOrFail($id);

        if ($task->user_id != $request->session()->get('user_id'))
        {
            return view('user.login', [
                'message' => 'Access denied',
            ]);
        }

        $task->title = $validated['title'];
        $task->start_time = $validated['start_time'];
        $task->end_time = $validated['end_time'];
        $task->is_done = $validated['is_done'];
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->user_id != $request->session()->get('user_id'))
        {
            return view('user.login', [
                'message' => 'Access denied',
            ]);
        }

        $task->is_done = true;
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
