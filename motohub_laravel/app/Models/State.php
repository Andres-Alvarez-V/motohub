<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * State ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the State item primary key (id)
     * $this->attributes['name'] - string - contains the State item name
     */
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
}
