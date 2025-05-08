<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
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
        'address',
        'user_id',
        'category_id',
        'website',
        'phone',
        'email',
        'logo',
        'cover',
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
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | This model has the following relationships:
    | - user
    | - category
    | - products
    |
    */
    
    /**
     * Get the user that owns the business.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the business.
     */
    public function category()
    {
        return $this->belongsTo(BusinesCategorie::class, 'category_id');
    }

    /**
     * Get the products for the business.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'business_id');
    }

    
}
