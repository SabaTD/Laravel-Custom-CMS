<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   protected $fillable = [
     'image', 'publish',
  ];

  public function galleryDetail()
  {
     return $this->hasMany(GalleryDetail::class);
  }

  public function galleryImage()
  {
     return $this->hasMany(GalleryImage::class);
  }
}
