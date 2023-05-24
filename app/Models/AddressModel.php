<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
    use HasFactory;
    protected $table = 'address';
    //relacion con tabla profile
    public function profile()
    {
        return $this->belongsTo(ProfileModel::class);
    }
    //relacion con tabla municipio
    public function municipio()
    {
        return $this->belongsTo(MunicipioModel::class);
    }
    //relacion con tabla state
    public function state()
    {
        return $this->belongsTo(StateModel::class);
    }
    //relacion con tabla country
    public function country()
    {
        return $this->belongsTo(CountryModel::class);
    }
}
