<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_user_id',
        'provider_user_name',
        'provider_user_email',
        'provider_user_avatar',
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
    |
    */

    /**
     * Get the user that owns the social account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | This model has the following attributes:
    | - provider_name
    | - provider_user_name
    | - provider_user_avatar
    | - provider_user_email
    | - provider_user_id
    |
    */

    /**
     * Get the provider name.
     *
     * @return string
     */
    public function getProviderNameAttribute()
    {
        return ucfirst($this->provider);
    }

    /**
     * Get the provider user name.
     *
     * @return string
     */
    public function getProviderUserNameAttribute()
    {
        return $this->provider_user_name ?? $this->provider_user_email;
    }
    /**
     * Get the provider user avatar.
     *
     * @return string
     */
    public function getProviderUserAvatarAttribute()
    {
        return $this->provider_user_avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->provider_user_name);
    }

    /**
     * Get the provider user email.
     *
     * @return string
     */
    public function getProviderUserEmailAttribute()
    {
        return $this->provider_user_email ?? $this->provider_user_name;
    }

    /**
     * Get the provider user id.
     *
     * @return string
     */
    public function getProviderUserIdAttribute()
    {
        return $this->provider_user_id ?? $this->provider_user_name;
    }
}
