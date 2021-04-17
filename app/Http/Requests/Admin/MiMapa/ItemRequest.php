<?php

namespace App\Http\Requests\Admin\MiMapa;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true; /* el authorize se hace con el policy y middelware */
    }

    
    public function rules()
    {
        $item = $this->route()->parameter('item');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:items',
            'status' => 'required|in:1,2,3,4,5',
            'file'  => 'image'
        ];

        if ($item) {
            $rules['slug'] = 'required|unique:items,slug,' . $item->id;
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
