<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\ToPrivateTaskRequest;
use App\Http\Requests\DeadLineTaskRequest;
use App\Transformers\TaskTransformer;


class TaskController extends Controller
{	
	/*
	* show all public tasks - guest can visit this route too 
	*/
	public function index()
	{
		$task = Task::where('visibility', 'Public')->get();

		return fractal()
        ->collection($task)
        ->parseIncludes(['user'])
        ->transformWith(new TaskTransformer)
        ->toArray();
	}

  /*
  * update an exists task
  */
  public function update(UpdateTaskRequest $request, Task $task)
  {
       $this->authorize('own', $task);

       $task->title= $request->get('title', $task->title);
       $task->body= $request->get('body', $task->body);

       $task->save();

       return fractal()
       ->item($task)
       ->parseIncludes(['user'])
       ->transformWith(new TaskTransformer)
       ->toArray();
  }


  /*
  * show a specific task
  */
  public function show(Task $task)
  {
    return fractal()
        ->item($task)
        ->parseIncludes(['user'])
        ->transformWith(new TaskTransformer)
        ->toArray();
  }


  /*
  * save a new task
  */
    public function store(StoreTaskRequest $request)
    {

        $task = new Task;
      
      $task->title = $request->title;
      $task->body = $request->body;
      $task->deadline = $request->deadline;
      $task->visibility = "Public";
      $task->user_id = $request->user()->id;
      
      $task->save();

      return fractal()
        ->item($task)
        ->parseIncludes(['user'])
        ->transformWith(new TaskTransformer)
        ->toArray();
        
    }

  /*
  * delete an exists task
  */
    public function destroy(Task $task)
    {
    //policies to make sure it's the owner of the task 
        $this->authorize('own', $task); 

        $task->delete();

        return response(null, 204); //successfull + no content 
        
    }



  /*
  * toggle an exists task-visibility
  */
  public function toggle(Task $task)
  {
       $this->authorize('own', $task);

       if($task->visibility === "Public")
       {
          $task->visibility= "Private";

          $task->save();
       }
       else
       {
          $task->visibility= "Public";

          $task->save();
       }

       return fractal()
       ->item($task)
       ->parseIncludes(['user'])
       ->transformWith(new TaskTransformer)
       ->toArray();
  }

  /*
  * update an exists task-deadline
  */
  public function deadLine(DeadLineTaskRequest $request, Task $task)
  {
       $this->authorize('own', $task);

       $task->deadline= $request->get('deadline', $task->deadline);

       $task->save();

       return fractal()
       ->item($task)
       ->parseIncludes(['user'])
       ->transformWith(new TaskTransformer)
       ->toArray();
  }

  /*
  * update an exists task-visibility
  */
  public function toPrivate(ToPrivateTaskRequest $request, Task $task)
  {
       $this->authorize('own', $task);

       $task->visibility= $request->get('visibility', $task->visibility);

       $task->save();

       return fractal()
       ->item($task)
       ->parseIncludes(['user'])
       ->transformWith(new TaskTransformer)
       ->toArray();
  }

}


