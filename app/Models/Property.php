<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function propertyGroup()
    {
        return $this->belongsTo(PropertyGroup::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }

    public function getValueForProduct(Product $product)
    {
        $productPropertyQuery = $this->products()->where('product_id', $product->id);

        if (!$productPropertyQuery->exists()){
            return null;
        }

        return $productPropertyQuery->first()->pivot->value;
    }
}
