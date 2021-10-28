<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            //
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'contact_no'=>'required',
            'location'=>'required',
            'logo'=>'required',
            'icon'=>'required',
            'quotation'=>'required',
            'facebook_link'=>'required',
        ];
    }
}
