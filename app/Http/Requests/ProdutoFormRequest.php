<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nome' => 'required |min:10|max:80', 
        'codigo'=> 'required |min:10|max:80',
        'preco'=> 'required |min:10|max:80',
        'quantidade_estoque'=> 'required |min:10|max:80',
    
        ];
    }

    protected function failedValidation(Validator $validator)
    {
    

        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'erro de validação',
                'errors'=> $validator->errors()
            ],422));
        }
        
            public function messages()
            {
                return [
                    'nome.required'=> 'o campo nome é obrigatorio',
                    'nome.min'=> 'o campo deve conter no minimo 10 caracteres',
                    'nome.max'=> 'o campo deve conter no maximo 80 caracteres',
                    
                    'codigo.required'=> 'o campo codigo é obrigatorio',
                    'codigo.min'=> 'o campo deve conter no minimo 10 caracteres',
                    'codigo.max'=> 'o campo deve conter no maximo 80 caracteres',
        
        
                   'preco.required'=>'o campo preco é obrigatorio',
                   'preco.min'=> 'o campo deve conter no minimo 10 caracteres',
                    'preco.max'=> 'o campo deve conter no maximo 80 caracteres',
        
        
                    'quantidade_estoque.required'=>'o campo quantidade_estoque é obrigatorio',
                   'quantidade_estoque.min'=> 'o campo deve conter no minimo 10 caracteres',
                    'quantidade_estoque.max'=> 'o campo deve conter no maximo 80 caracteres',
        
        
                ];
}
    
}