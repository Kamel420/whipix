<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TasksPolicy
{
	/*this policy checks if the user own the task which he/she perform action over it */
    use HandlesAuthorization;

    public function  own(User $user,Task $task)
    {
      return $user->id === $task->user_id;
    }
    
    
}