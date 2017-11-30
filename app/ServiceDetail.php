<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
   protected $fillable = [
      'service_id', 'title', 'description', 'lang',
   ];

   public function service()
   {
      return $this->belongsTo(Service::class);
   }

   public function getfillable()
   {
      return $this->fillable;
   }
}
