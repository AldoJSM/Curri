<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipioModel extends Model
{
    use HasFactory;
    protected $table = 'municipio';
    public function state()
    {
        return $this->belongsTo('App\Models\StateModel');
    }
}
