<?php

namespace Modules\Advertiser\Services;

use Modules\Advertiser\Entities\Category;

class CategoryService
{
    public function get($take = 12){
        return Category::select('id', 'name')->paginate($take);
    }

    public function find($id){
        return Category::findOrFail($id);
    }

    public function store($data){
        return Category::create($data);
    }

    public function update($data, $id){
         $category = Category::findOrFail($id);
         $category->update($data);

         return $category;
    }

    public function delete($id){
        return Category::findOrFail($id)->delete();
    }
}
