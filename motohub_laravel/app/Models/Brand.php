<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Brand extends Model
{
    use HasFactory;

    /**
     * Brand ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Brand item primary key (id)
     * $this->attributes['name'] - string - contains the Brand item name
     * $this->attributes['country_origin'] - string - contains the Brand item country origin
     * $this->attributes['foundation_year'] - int - contains the Brand item foundation year
     * $this->attributes['logo_image'] - string - contains the Brand item logo image
     * $this->attributes['description'] - string - contains the Brand item description
     * $this->attributes['created_at'] - string - contains the Brand creation date
     * $this->attributes['updated_at'] - string - contains the Brand update date
     * $this->motorcycles - Motorcycle[] - contains the associated motorcycles
     */

    protected $fillable = ['name', 'country_origin', 'foundation_year', 'logo_image', 'description'];

    public static function validateBrandRequest(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'country_origin' => 'required',
            'foundation_year' => 'required',
            'logo_image' => 'required',
            'description' => 'required',
        ]);
    }

    public static function validateBrandEdit(Request $request): void
    {
        $request->validate([
            'id' => 'required | numeric',
            'name' => 'min:1 | max:50',
            'country_origin' => 'min:1 | max:50',
            'foundation_year' => 'numeric | min:1 | max:50',
            'description' => 'min:1 | max:255',
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

    public function getCountryOrigin(): string
    {
        return $this->country_origin;
    }

    public function setCountryOrigin(string $country_origin): void
    {
        $this->country_origin = $country_origin;
    }

    public function getFoundationYear(): int
    {
        return $this->foundation_year;
    }

    public function setFoundationYear(int $foundation_year): void
    {
        $this->foundation_year = $foundation_year;
    }

    public function getLogoImage(): string
    {
        return $this->logo_image;
    }

    public function setLogoImage(string $logo_image): void
    {
        $this->logo_image = $logo_image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
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
    public function motorcycles(): HasMany
    {
        return $this->hasMany(Motorcycle::class);
    }

    public function getMotorcycles(): Collection
    {
        return $this->motorcycles;
    }

    public function setMotorcycles(Collection $motorcycles): void
    {
        $this->motorcycles = $motorcycles;
    }
}
