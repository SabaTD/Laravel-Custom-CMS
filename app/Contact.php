<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
   protected $fillable = [
    'phone', 'mobile', 'mail', 'facebook', 'youtube', 'instagram', 'twitter', 'longitude', 'latitude',
 ];

 public function contactDetail()
 {
    return $this->hasMany(ContactDetail::class);
 }
}
