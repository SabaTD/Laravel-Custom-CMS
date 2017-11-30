<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
   protected $fillable = [
     'image',
  ];

  public function aboutDetail()
  {
     return $this->hasMany(AboutDetail::class);
  }
}
