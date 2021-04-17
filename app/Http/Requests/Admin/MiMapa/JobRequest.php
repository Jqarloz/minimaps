<?php

namespace App\Http\Requests\Admin\MiMapa;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize()
    {
        return true; /* el authorize se hace con el policy y middelware */
    }

    
    public function rules()
    {
        $job = $this->route()->parameter('job');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:jobs',
            'status' => 'required|in:1,2,3,4,5',
            'file'  => 'image'
        ];

        if ($job) {
            $rules['slug'] = 'required|unique:jobs,slug,' . $job->id;
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
