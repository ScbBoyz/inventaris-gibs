<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventories';

    protected $fillable = [
        'room_id',
        'item_id',
        'quantity',
        'year',
        'number',
        'good',
        'not_good',
        'bad',
        'information',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
