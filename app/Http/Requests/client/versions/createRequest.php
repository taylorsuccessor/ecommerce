<?php

namespace App\Http\Requests\client\versions;

use App\Http\Requests\Request;

class createRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "products_id"=>'required|numeric',
            "version"=>'required',
            "manual"=>'required',
            "articale"=>'required',
            "links"=>'required',
            "release_notes"=>'required',

        ];
    }
}