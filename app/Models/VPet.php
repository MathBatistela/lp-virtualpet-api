<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VPet extends Model
{
    use HasFactory;

    protected $casts = [
        'health' => 'float',
        'hunger' => 'float',
        'happiness' => 'float'
    ];

    protected $fillable = [
        'userId',
        'name',
        'skin',
        'state',
        'health',
        'hunger',
        'happiness',
        'lastScene',
        'referenceTime'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
