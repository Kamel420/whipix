<?php

namespace App\Http\Controllers;

use App\User;
use App\Transformers\UserTransformer;
use App\Http\Requests\SearchUserRequest;
use Illuminate\Http\Request;


class SearchUserController extends Controller
{
  /*
  * Search for a specific user by username or email
  */
  public function search(SearchUserRequest $request)
  {
    $email = $request->email;
    $name = $request->name;
    

    $user = User::where('name', $name)
          ->orWhere('email', $email)
          ->get();
       
    	
	       return fractal()
	       ->collection($user)
	       ->transformWith(new UserTransformer)
	       ->toArray();


  }
}
