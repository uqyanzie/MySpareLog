<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;

class Type extends Model
{
    use HasFactory;

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
