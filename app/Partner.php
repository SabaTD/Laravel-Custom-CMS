<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
   protected $fillable = [
    'image', 'link', 'publish',
   ];

  public function partnerDetail()
  {
    return $this->hasMany(PartnerDetail::class);
  }

  public function getfillable()
  {
     return $this->fillable;
  }

}
