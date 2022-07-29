<?php

namespace Modules\Advertiser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertiser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function newFactory()
    {
        return \Modules\Advertiser\Database\factories\AdvertiserFactory::new();
    }

    public function ads(){
        return $this->hasMany(Ad::class);
    }
}
