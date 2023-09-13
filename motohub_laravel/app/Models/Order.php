<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['user_id'] - int - contains the order user foreign key (user_id)
     * $this->attributes['payment'] - string - contains the order payment status
     * $this->attributes['shipping_address'] - string - contains the order shipping address
     * $this->attributes['shipping_value'] - double - contains the order shipping value
     * $this->attributes['sub_total'] - double - contains the order sub total value
     * $this->attributes['total'] - double - contains the order total value
     * $this->attributes['active'] - boolean - contains the order status
     * $this->attributes['created_at'] - string - contains the Order creation date
     * $this->attributes['updated_at'] - string - contains the Order update date
     * $this->user - User - contains the associated user
     * $this->orderItems - OrderItem[] - contains the associated order items
     */
    protected $fillable = [
        'user_id',
        'payment',
        'shipping_address',
        'shipping_value',
        'sub_total',
        'total',
        'active',
    ];

    public static function validateAdd(Request $request): void
    {
        $request->validate([
            'motorcycle_id' => 'required|integer|min:1|gte:0',
            'quantity' => 'required|integer|min:1',
        ]);
    }

    public static function validateSave(Request $request): void
    {
        $request->validate([
            'shipping_address' => 'string|max:255|min:0',
        ]);
    }

    // Getters and Setters
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getPayment(): string
    {
        return $this->attributes['payment'];
    }

    public function setPayment(string $payment): void
    {
        $this->attributes['payment'] = $payment;
    }

    public function getShippingAddress(): string
    {
        return $this->attributes['shipping_address'];
    }

    public function setShippingAddress(string $shippingAddress): void
    {
        $this->attributes['shipping_address'] = $shippingAddress;
    }

    public function getShippingValue(): float
    {
        return $this->attributes['shipping_value'];
    }

    public function setShippingValue(float $shippingValue): void
    {
        $this->attributes['shipping_value'] = $shippingValue;
    }

    public function getSubTotal(): float
    {
        return $this->attributes['sub_total'];
    }

    public function setSubTotal(float $subTotal): void
    {
        $this->attributes['sub_total'] = $subTotal;
    }

    public function getTotal(): float
    {
        return $this->attributes['total'];
    }

    public function setTotal(float $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    public function setActive(bool $active): void
    {
        $this->attributes['active'] = $active;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function setOrderItems(Collection $orderItems): void
    {
        $this->orderItems = $orderItems;
    }
}
