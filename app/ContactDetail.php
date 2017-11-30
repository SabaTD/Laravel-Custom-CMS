<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
   protected $fillable = [
    'contact_id','address','lang',
 ];
 public function contact()
 {
    return $this->belongsTo(Contact::class);
 }
}
