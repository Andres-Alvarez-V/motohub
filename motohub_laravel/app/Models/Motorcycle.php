<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motorcycle extends Model
{
    use HasFactory;

    /**
     * Motorcycle ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Motorcycle item primary key (id)
     * $this->attributes['name'] - string - contains the Motorcycle item name
     * $this->attributes['brand_id'] - int - contains the Motorcycle item brand foreign key (brand_id)
     * $this->attributes['model'] - string - contains the Motorcycle item model
     * $this->attributes['category'] - string - contains the Motorcycle item category
     * $this->attributes['image'] - string - contains the Motorcycle item image
     * $this->attributes['description'] - string - contains the Motorcycle item description
     * $this->attributes['price'] - float - contains the Motorcycle item price
     * $this->attributes['stock'] - int - contains the Motorcycle item stock
     * $this->attributes['state'] - string - contains the Motorcycle item state
     * $this->attributes['is_active'] - boolean - contains the Motorcycle item status to determine if it can be shown
     * $this->attributes['created_at'] - string - contains the Motorcycle creation date
     * $this->attributes['updated_at'] - string - contains the Motorcycle update date
     * $this->brand - Brand - contains the associated brand
     * $this->orderItems - OrderItem[] - contains the associated order items
     */
    protected $fillable = ['name', 'model', 'category', 'image', 'description', 'price', 'stock', 'state', 'brand_id'];


    public static function validateMotorcycleRequest(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'category' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'state' => 'required',
            'brand_id' => 'required'
        ]);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    public function setBrandId(int $id): void
    {
        $this->brand_id = $id;
    }

    public function getIsActive(): bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->is_active = $isActive;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }


    //Relationships

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function orderItems(): HasMany
    {
        return $this->HasMany(OrderItem::class);
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
