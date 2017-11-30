<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   protected $fillable = [
     'image', 'publish', 'featured',
  ];

  public function roomDetail()
  {
     return $this->hasMany(RoomDetail::class);
  }

  public function roomImage()
  {
     return $this->hasMany(RoomImage::class);
  }
}
