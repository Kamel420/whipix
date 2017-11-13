<?php

namespace App\Transformers;

use App\User;

class UserTransformer extends \League\Fractal\TransformerAbstract {
  
  public function transform(User $user)
  {/*the response*/
    return [
      'name' => $user->name,
      'email' => $user->email,
      'avatar' => $user->avatar(),
    ];
  }
}