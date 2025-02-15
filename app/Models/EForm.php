<?php

namespace App\Models;

use App\Enums\EFormStatusEnum;
use App\Enums\EFormTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EForm extends Model
{
    use SoftDeletes;

    protected $fillable =  [
        'name',
        'description',
        'request_manager_id',
        'type',
        'status',
        'code',
        'sla'
    ];

    public function casts(): array
    {
        return [
            'status' => EFormStatusEnum::class,
            'type' => EFormTypeEnum::class,
        ];
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    public function requestManager(): BelongsTo
    {
        return $this->belongsTo(RequestManager::class);
    }
}
