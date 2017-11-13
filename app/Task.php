<?php

namespace App;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{	
	use Orderable;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'deadline', 'visibility'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'visibility'
    ];

    /*the relation between the task and the user*/
	public function user()
	{
      return $this->belongsTo(User::class);
    }
}
