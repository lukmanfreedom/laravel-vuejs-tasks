<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class TasksController extends Controller
{
    public function index()
    {
        return Tasks::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task_detail' => 'required|max:255'
        ]);

        return Tasks::create($request->all());
    }

    public function destroy($id)
    {
        $task = Tasks::where('id', $id)->first();
        $task->delete();
    }
}
