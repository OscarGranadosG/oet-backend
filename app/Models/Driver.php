<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'drivers';

    protected $fillable = [
        'document',
        'first_name',
        'second_name',
        'last_name',
        'address',
        'phone',
        'city'
    ];

    public static function saveDriver($data)
    {
        return Driver::create($data);
    }

    public static function getAll()
    {
        return Driver::select()->get();
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle');
    }
}
