<?php

namespace App\Models;

use App\Models\PriceRuleType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceRule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rule_type_id',
        'name',
        'slug',
        'description',
        'status',
        'starts_at',
        'ends_at',
        'priority',
        'stop_further_rules',
        'is_combinable',
        'coupon_required',
        'condition_match',
        'usage_limit',
        'usage_per_customer',
        'usage_count',
        'currency',
        'metadata',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'stop_further_rules' => 'boolean',
        'is_combinable' => 'boolean',
        'coupon_required' => 'boolean',
        'metadata' => 'array',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(PriceRuleType::class, 'rule_type_id');
    }

    public function conditions(): HasMany
    {
        return $this->hasMany(PriceRuleCondition::class)->orderBy('sort_order');
    }

    public function actions(): HasMany
    {
        return $this->hasMany(PriceRuleAction::class)->orderBy('sort_order');
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(PriceRuleCoupon::class);
    }

    public function usages(): HasMany
    {
        return $this->hasMany(PriceRuleUsage::class);
    }

    public function targets(): HasMany
    {
        return $this->hasMany(PriceRuleTarget::class);
    }

    public function scopeActive($query)
    {
        return $query
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());
            });
    }
}