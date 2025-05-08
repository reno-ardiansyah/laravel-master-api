<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
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
    | - products
    |
    */
    /**
     * Get the products for the status.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'status_id');
    }
}
