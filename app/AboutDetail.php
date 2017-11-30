<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutDetail extends Model
{
   protected $fillable = [
     'about_id','title','description','lang',
  ];
  public function about()
  {
     return $this->belongsTo(About::class);
  }
}
