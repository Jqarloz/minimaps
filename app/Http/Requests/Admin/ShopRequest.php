<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    
    public function authorize()
    {
        /* if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        } */
        return true;
    }

    
    public function rules()
    {
        $shop = $this->route()->parameter('shop');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:shops',
            'status' => 'required|in:1,2,3,4,5',
            'file'  => 'image'
        ];

        if ($shop) {
            $rules['slug'] = 'required|unique:shops,slug,' . $shop->id;
        }

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
