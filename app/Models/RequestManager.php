<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestManager extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'company_id'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function eforms(): HasMany
    {
        return $this->hasMany(EForm::class);
    }
}
