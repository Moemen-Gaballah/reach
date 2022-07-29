<?php

namespace Modules\Advertiser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|in:free,paid',
            'start_date' => 'date_format:Y-m-d', // TODO Validation rule for must be after or equal now
            'category_id' => 'required|exists:categories,id',
            'advertiser_id' => 'required|exists:advertisers,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id'
        ];
    }
}
