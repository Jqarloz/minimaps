<?php

namespace App\Http\Requests\Admin\MiMapa;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true; /* el authorize se hace con el policy y middelware */
    }

    
    public function rules()
    {
        $service = $this->route()->parameter('service');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:shops',
            'status' => 'required|in:1,2,3,4,5',
            'file'  => 'image'
        ];

        if ($service) {
            $rules['slug'] = 'required|unique:shops,slug,' . $service->id;
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
