<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('post')){
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'status' => 'required',
                'phone' => 'required|max:255',
                'password' => 'required|string|max:255',
                'image' => 'required|image|mames:png,jpep,jpg,gif,svg|max:2048',
            ];

        }else {
            return
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'status' => 'required',
                'phone' => 'required|max:255',
                'password' => 'required|string|max:255',
                'image' => 'required|image|mames:png,jpep,jpg,gif,svg|max:2048',
            ];
        }
         [
            //
        ];
    }
    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'name.required' => 'name is required',
                'email' => 'email is required',
                'address.required' => 'address is required',
                'status.required' => 'status is required',
                'phone.required' => 'phone is required',
                'password.required' => 'password is required',
                'image.required' => 'image is required',
            ];

    }else{
        return [
            'name.required' => 'name is required',
            'email' => 'email is required',
            'address.required' => 'address is required',
            'status.required' => 'status is required',
            'phone.required' => 'phone is required',
            'password.required' => 'password is required',
            'image.required' => 'image is required',
        ];
    }
    }
}
