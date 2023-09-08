<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthDate',
        'address',
        'email',
        'password',
        'username',
        'balance',
        'role',
    ];

    protected $hidden = [
        'password'
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
        $this->attributes['birthDate'] = $birthDate;
    }

    public function getBirthDate(): string
    {
        return $this->attributes['birthDate'];
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
}
