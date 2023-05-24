<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    use HasFactory;
    protected $table = 'state';
    //relacion con tabla country
    public function country()
    {
        return $this->belongsTo(CountryModel::class);
    }
}
