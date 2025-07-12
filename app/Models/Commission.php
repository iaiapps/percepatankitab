<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $guarded = ['id'];

    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
