<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFranchiseRequest extends FormRequest
{
    public function authorize()
    {
        if (session('user')->id != $_REQUEST['user_id']) {
            return false;
        }
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|min:3',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Franchise is not associated to any User',
            'user_id.exists' => 'Invalid User',
            'name.required' => 'Franchise must have a name',
            'name.min:3' => 'Franchise name must have a minimum of 3 characters',
            'address.required' => 'Franchise must have a address',
            'phone.required' => 'Franchise must have a phone',
            'email.required' => 'Franchise must have an email'
        ];
    }
}
