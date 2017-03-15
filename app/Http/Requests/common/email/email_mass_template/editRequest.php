<?php
namespace App\Http\Requests\common\email\email_mass_template;

use App\Http\Requests\Request;

class editRequest extends Request
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
    "email_group_id"=>'required',
    "name"=>'required',
    "subject"=>'required',
    "body"=>'required',
    "language"=>'required',
    "created_at"=>'required',
    "updated_at"=>'required',



];
}
}
