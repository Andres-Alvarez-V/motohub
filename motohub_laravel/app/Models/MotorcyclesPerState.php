<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MotorcyclesPerState extends Model
{
    /**
     * State ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the State item primary key (id)
     * $this->attributes['motorcycle_id'] - int - contains the motorcycle_id
     * $this->attributes['state_id'] - int - contains the state_id
     * $this->attributes['quantity'] - int - contains the how much of the same bike are in the state
     */

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    //Relationships

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function getState(): Collection
    {
        return $this->state;
    }
}
