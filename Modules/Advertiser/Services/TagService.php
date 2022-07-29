<?php

namespace Modules\Advertiser\Services;

use Modules\Advertiser\Entities\Tag;

class TagService
{
    public function get($take = 12){
        return Tag::select('id', 'name')->paginate($take);
    }

    public function find($id){
        return Tag::findOrFail($id);
    }

    public function store($data){
        return Tag::create($data);
    }

    public function update($data, $id){
         $tag = Tag::findOrFail($id);
        $tag->update($data);

         return $tag;
    }

    public function delete($id){
        return Tag::findOrFail($id)->delete();
    }
}
