<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceRuleCoupon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'price_rule_id',
        'code',
        'type',
        'is_active',
        'usage_limit',
        'usage_count',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(PriceRule::class, 'price_rule_id');
    }
}