<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Scout\Searchable;

class Person extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];

    public static $rules = [
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer'
    ];

    public function getNameAndAgeAttribute()
    {
        return $this->name.'('.$this->age.')';
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

}
