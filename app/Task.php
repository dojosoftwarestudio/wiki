<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    protected $fillable = [
        'keep', 'user_id'
    ];

    public function format(){
		return [
            'task_id' => $this->id,
            'keep' => $this->keep,
            'user' => $this->user->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'update' => $this->user->created_at->diffForHumans(),
        ];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
