<?php

namespace Tassili\Free\Models;

use Illuminate\Database\Eloquent\Model;

class TassiliCrud extends Model
{

    protected $fillable = [
        'model',
        'label',
        'route',
        'icon',
        'active',
    ];
    
    protected $casts = [
        'active' => 'boolean',
    ];
}