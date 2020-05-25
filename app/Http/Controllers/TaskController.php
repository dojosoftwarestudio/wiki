<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ITaskRepository;
use App\Task;


class TaskController extends Controller
{
    protected $repository;

    public function __construct(ITaskRepository $respository){
        $this->repository = $respository;
    }
    public function index(Request $req){
        $list = $this->repository->list(10);
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
    public function create(Request $req){
        $this->validate($req, [
            'keep'=> 'required'
        ]);
        $req['user_id'] = 3;
        $this->repository->create($req->all());
        return;
    }
    public function update(Request $req, $id){
        $this->validate( $req, [
            'keep' => 'required' ]);
        $req['user_id'] = 1;
        $this->repository->update($req->all(), $id);
        return;
    }
    public function destroy($id){
        return $this->repository->delete($id);
    }
    public function listFormat(){
        return $this->repository->listFormat();
    }
}
