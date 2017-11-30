<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   protected $fillable = [
      'image', 'publish',
   ];

    public function serviceDetail()
    {
      return $this->hasMany(ServiceDetail::class);
    }

    public function getfillable()
    {
       return $this->fillable;
    }
}
