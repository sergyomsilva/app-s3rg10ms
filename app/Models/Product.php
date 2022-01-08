<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku'
    ];

    public function transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d/m/Y h:m:i');
    }
    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d/m/Y h:m:i');
    }
}
