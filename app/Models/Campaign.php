<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property-read Collection<int, Payout> $payouts
 * @property-read int|null $payouts_count
 * @method static Builder<static>|Campaign newModelQuery()
 * @method static Builder<static>|Campaign newQuery()
 * @method static Builder<static>|Campaign query()
 * @mixin \Eloquent
 */
class Campaign extends Model
{
    use HasFactory;
    protected $fillable = ["title", "active", "start_date", "end_date"];

    public function payouts(): HasMany
    {
        return $this->hasMany(Payout::class);
    }
}
