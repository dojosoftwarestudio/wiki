<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index(Request $req)
    {
        $list = Task::orderBy('id', 'desc')->paginate(10);
        return [ 'pagination' => [
                    'total'        => $list->total(),
                    'current_page' => $list->currentPage(),
                    'per_page'     => $list->perPage(),
                    'last_page'    => $list->lastPage(),
                    'from'         => $list->firstItem(),
                    'to'           => $list->lastItem()
                ] ,
                'tasks' => $list
                ];
    }


    public function store(Request $req)
    {
        $this->validate($req, [
            'keep'=> 'required'
        ]);
        Task::create($req->all());
        return;
    }

    public function show($id)
    {
        //
    }



    public function update(Request $req, $id)
    {
        $this->validate( $req, [
            'keep' => 'required' ]);
        Task::find($id)->update($req->all());
        return;
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
