<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceRuleTarget extends Model
{
    protected $fillable = [
        'price_rule_id',
        'target_type',
        'target_id',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(PriceRule::class, 'price_rule_id');
    }
}