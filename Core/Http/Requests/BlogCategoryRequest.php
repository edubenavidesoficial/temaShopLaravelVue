<?php

namespace Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
        if($this->input('id')){
            return [
                'name' => 'required|max:225|unique:tl_blog_categories,name,'.$this->input('id'),
                'permalink' => 'required|unique:tl_blog_categories,permalink,'.$this->input('id'),
            ];
        }else{
            return [
                'name' => 'required|max:225|unique:tl_blog_categories,name',
                'permalink' => 'required|unique:tl_blog_categories,permalink',
    
            ];
        }
    }

    /**
     * Custom message
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => translate('Please Insert a Name'),
            'name.unique' => translate('This Name is Already Available Please Insert Another'),
            'name.max' => translate('Please Write The Category Name under 225 words'),
            'permalink.unique' => translate('This Permalink is Already Available Please Insert Another')
        ];
    }
}
