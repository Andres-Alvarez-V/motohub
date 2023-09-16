<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * ORDER ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the order item primary key (id)
     * $this->attributes['motorcycle_id'] - int - contains the order item motorcycle foreign key (motorcycle_id)
     * $this->attributes['order_id'] - int - contains the order item order foreign key (order_id)
     * $this->attributes['quantity'] - int - contains the order item quantity
     * $this->motorcycle - Motorcycle - contains the associated motorcycle
     * $this->order - Order - contains the associated order
     * $this->attributes['created_at'] - string - contains the OrderItem creation date
     * $this->attributes['updated_at'] - string - contains the OrderItem update date
     */
    protected $fillable = ['motorcycle_id', 'order_id', 'quantity'];

    // Getters and Setters
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }


    // Relationships
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Collection
    {
        return $this->order;
    }

    public function setOrder(Collection $order): void
    {
        $this->order = $order;
    }

    public function motorcycle(): BelongsTo
    {
        return $this->belongsTo(Motorcycle::class);
    }

    public function getMotorcycle(): Collection
    {
        return $this->motorcycle;
    }

    public function setMotorcycle(Collection $motorcycle): void
    {
        $this->motorcycle = $motorcycle;
    }
}
