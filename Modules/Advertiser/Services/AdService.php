<?php

namespace Modules\Advertiser\Services;

use Modules\Advertiser\Entities\Ad;

class AdService
{
    public function get($take = 12)
    {
        return Ad::filterBy(request()->all())->select('id', 'title')->paginate($take);
    }

    public function find($id)
    {
        return Ad::findOrFail($id);
    }

    public function store($data)
    {
        $ad = Ad::create($data);
        $ad->tags()->attach($data['tags']);
        return $ad;
    }

    public function update($data, $id)
    {
        $tag = Ad::findOrFail($id);
        $tag->update($data);

        return $tag;
    }

    public function delete($id)
    {
        return Ad::findOrFail($id)->delete();
    }
}
