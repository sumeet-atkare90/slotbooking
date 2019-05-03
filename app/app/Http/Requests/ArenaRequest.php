<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArenaRequest extends FormRequest
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
            'franchise_id' => 'required|exists:franchises,id',
            'arena_type_id' => 'required|exists:arena_types,id',
            'description' => 'required|min:10|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'franchise_id.required' => 'Arena is not associated to any Franchise',
            'franchise.exists' => 'Invalid Franchise',
            'arena_type_id.required' => 'Arena is not associated to any Type',
            'arena_type_id.exists' => 'Invalid Arena Type',
            'description.required' => 'Description is mandatory',
            'description.min' => 'Description must have atleast 10 characters',
            'description.max' => 'Description must not be greater than 1000 characters'
        ];
    }
}
