<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class EFormConfiguration extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = ['eform_id', 'primary_color', 'private', 'users', 'is_public', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_public' => 'boolean'
    ];
}
