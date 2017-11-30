<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryDetail extends Model
{
   protected $fillable = [
     'gallery_id', 'title', 'lang'
  ];

  public function gallery()
  {
     return $this->belongsTo(Gallery::class);
  }
}
