<?php

namespace Modules\Advertiser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];

    protected static function newFactory()
    {
        return \Modules\Advertiser\Database\factories\TagFactory::new();
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }
}
