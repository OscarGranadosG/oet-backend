<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'owners';

    protected $fillable = [
        'document',
        'first_name',
        'second_name',
        'last_name',
        'address',
        'phone',
        'city'
    ];

    public static function saveOwner($data)
    {
        return Owner::create($data);
    }

    public static function getAll()
    {
        return Owner::select()->get();
    }

    public function vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle');
    }
}
