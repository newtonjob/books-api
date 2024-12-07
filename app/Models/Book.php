<?php

namespace App\Models;

use App\Observers\BookObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(BookObserver::class)]
class Book extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
