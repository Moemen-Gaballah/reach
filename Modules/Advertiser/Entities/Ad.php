<?php

namespace Modules\Advertiser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Advertiser\Filter\AdFilters\Filterable;

class Ad extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        "title",
        "description",
        "type",
        "start_date",
        "category_id",
        "advertiser_id"
    ];

    protected static function newFactory()
    {
        return \Modules\Advertiser\Database\factories\AdFactory::new();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
