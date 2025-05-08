<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinesCategorie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'icon',
        'name',
        'slug',
        'description',
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
    | - businesses
    |
    */
    /**
     * Get the businesses for the category.
     */
    public function businesses()
    {
        return $this->hasMany(Businesses::class, 'category_id');
    }
}
