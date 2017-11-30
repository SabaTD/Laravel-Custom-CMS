<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
   protected $fillable = [
     'room_id', 'title', 'description', 'lang'
  ];

  public function room()
  {
     return $this->belongsTo(Room::class);
  }
}
