<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'=>'required',
            'description'=> 'required|min:10',
            'quntity'=> 'required|numeric',
            //'image'=> 'required|image',
            
        //    ' category_id'=>'required|numeric',
           'category_id' => 'sometimes|exists:categories,id',
            'price'=> 'required|numeric'

        ];
        if ($this->route()->getActionMethod()==='store'){
            $rules['image'] = 'required|image';
        }
        return $rules;
    }
}
