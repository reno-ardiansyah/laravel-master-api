<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'business_id',
        'status_id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'sku',
        'barcode',
        'stock',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /*
    |----------------------------------------------------------------------
    | Relationships
    |----------------------------------------------------------------------
    |
    | This model has the following relationships:
    | - category
    | - status
    | - business
    | - carts
    |
    */

    /**
     * Get the category for the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategorie::class, 'category_id');
    }

    /**
     * Get the status for the product.
     */
    public function status()
    {
        return $this->belongsTo(ProductStatus::class, 'status_id');
    }

    /**
     * Get the business for the product.
     */
    public function business()
    {
        return $this->belongsTo(Businesses::class, 'business_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
