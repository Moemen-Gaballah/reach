<?php

namespace Modules\Advertiser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];

    protected static function newFactory()
    {
        return \Modules\Advertiser\Database\factories\CategoryFactory::new();
    }
}
