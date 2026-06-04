<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceRuleUsage extends Model
{
    protected $fillable = [
        'price_rule_id',
        'customer_id',
        'order_id',
        'discount_amount',
        'order_subtotal',
        'currency',
    ];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(PriceRule::class, 'price_rule_id');
    }
}