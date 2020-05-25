<?php

namespace App\Repositories\Eloquent;

use App\Repositories\ITaskRepository;
use App\Task;
use Illuminate\Http\Request;


class TaskRepository implements ITaskRepository
{
	protected $model;
	function __construct(Task $model){
		$this->model = $model;
	}
    public function find($id){
        return "Not implementation exists";
    }
    public function list($rowsQty){
        return $this->model->orderBy('id', 'desc')->paginate($rowsQty);
    }
	public function listFormat(){
        return $this->model
                    ->orderBy('id', 'desc')
                    ->with('user')
                    ->get()
                    ->map
                    ->format();
    }
    public function create($req){
        Task::create($req);
    }
    public function update(array $data, $id){
        Task::findOrFail($id)->update($data);
    }
    public function delete($id){
        Task::findOrFail($id)->delete();
    }

}