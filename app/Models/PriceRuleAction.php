<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceRuleAction extends Model
{
    protected $fillable = [
        'price_rule_id',
        'action_type',
        'configuration',
        'sort_order',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(PriceRule::class, 'price_rule_id');
    }
}
