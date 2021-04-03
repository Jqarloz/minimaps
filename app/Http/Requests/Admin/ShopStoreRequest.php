<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }

    
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:shops',
            'status' => 'required|in:1,2,3,4,5',
            'file'  => 'image'
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules,[
                'category_id' => 'required',
                'tags' => 'required',
                'description' => 'required',
            ]);
        }

        return $rules;
    }
}
