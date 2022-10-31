<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentStoreRequest extends FormRequest
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
            'name'=>'required|min:2|max:255',
            'nic'=>'',
            'dob'=>'required|date',
            'gender'=>'required|min:1',
            'phone'=>'max:11',
            'phone1'=>'max:11',
            'email'=>'sometimes',
            'address'=>'required|min:2',
            'parent_name'=>'required',
            'parent_contact'=>'',
            'parent_contact1'=>''
        ];
    }
}
