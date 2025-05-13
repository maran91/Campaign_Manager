<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property-read Campaign|null $campaigns
 * @method static Builder<static>|Payout newModelQuery()
 * @method static Builder<static>|Payout newQuery()
 * @method static Builder<static>|Payout query()
 * @mixin Eloquent
 */
class Payout extends Model
{
    protected $fillable = [
        'campaign_id',
        'country',
        'amount',
    ];

    public function campaigns(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
