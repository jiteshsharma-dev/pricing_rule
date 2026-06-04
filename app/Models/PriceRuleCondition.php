<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceRuleCondition extends Model
{
    protected $fillable = [
        'price_rule_id',
        'field',
        'operator',
        'value',
        'sort_order',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(PriceRule::class, 'price_rule_id');
    }
}