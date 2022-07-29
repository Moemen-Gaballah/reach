<?php

namespace Modules\Advertiser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->method() == 'POST') {
            return [
                'name' => 'required|max:255|unique:tags,name',
            ];

        }else{
            return [
                'name' => 'required|max:255|unique:tags,name,'.$this->route('tag'),
            ];
        }
    }

}
