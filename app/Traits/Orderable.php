<?php

namespace App\Traits;
/**
 * to fetch in orderable way
 */
trait Orderable
{
  
  public function scopeLatestFirst($query)
  {
      return $query->orderBy('created_at', 'desc');
  }
   

}