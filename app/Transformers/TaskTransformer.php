<?php

namespace App\Transformers;

use App\Task;

class TaskTransformer extends \League\Fractal\TransformerAbstract {

  protected $availableIncludes =['user']; // if it's the only include u can use defaultincludes

  public function transform(Task $task){
    /*the response*/
    return [
      'id' => $task->id,
      'title' => $task->title,
      'body' => $task->body,
      'deadline' => $task->deadline,
      'visibility' => $task->visibility, 
      'created_at' => $task->created_at->toDateTimeString(),
      'created_at_human' => $task->created_at->diffForHumans(),
    ];
  }

  /*includes between task and user */
  public  function includeUser(Task $task){
    return $this->item($task->user,  new UserTransformer);
  }
}