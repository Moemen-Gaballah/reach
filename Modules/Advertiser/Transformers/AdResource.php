<?php

namespace Modules\Advertiser\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'             => $this->title,
            'description'       => $this->description,
            'type'              => $this->type,
            'start_date'        => $this->start_date,
            'category_id'       => $this->category_id,
            'advertiser_id'     => $this->advertiser_id
        ];
    }
}
