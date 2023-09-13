<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * User ATTRIBUTES
     * $this->attributes['id'] - int - contains the User primary key (id)
     * $this->attributes['name'] - string - contains the User name
     * $this->attributes['birth_date'] - string - contains the User birthDate
     * $this->attributes['address'] - string - contains the User address
     * $this->attributes['email'] - string - contains the User email
     * $this->attributes['password'] - string - contains the User password
     * $this->attributes['username'] - string - contains the User username
     * $this->attributes['balance'] - float - contains the User balance
     * $this->attributes['role'] - string - contains the User role
     * $this->attributes['created_at'] - string - contains the User creation date
     * $this->attributes['updated_at'] - string - contains the User update date
     */

    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'address',
        'email',
        'password',
        'username',
        'balance',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birthDate' => 'date',
    ];

    public function setName(string $name): void
    {
        $this->attributes['name'] = ucwords($name);
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->attributes['birth_date'] = $birthDate;
    }

    public function getBirthDate(): string
    {
        return $this->attributes['birth_date'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = ucwords($address);
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = strtolower($email);
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setUsername(string $username): void
    {
        $this->attributes['username'] = strtolower($username);
    }

    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    public function setBalance(float $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    public function getBalance(): float
    {
        return $this->attributes['balance'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    // Relationships
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrder(): Collection
    {
        return $this->orders;
    }

    public function setOrder(Collection $orders): void
    {
        $this->orders = $orders;
    }

}
