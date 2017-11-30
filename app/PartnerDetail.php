<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerDetail extends Model
{
    protected $fillable = [
        'partner_id', 'title', 'description', 'lang',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function getfillable()
    {
       return $this->fillable;
    }
}
