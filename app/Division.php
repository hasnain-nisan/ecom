<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\district;

class Division extends Model
{
    public function districts()
    {
      return $this->hasMany(District::class);
    }
}
