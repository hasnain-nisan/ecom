<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Division;

class District extends Model
{
    public function division()
    {
      return $this->belongsTo(Division::class);
    }
}
