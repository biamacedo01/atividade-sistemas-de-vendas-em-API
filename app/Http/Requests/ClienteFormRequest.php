<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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

            'nome' => 'required|min:10|max:80',
            'email' => 'required|min:10|max:80',
            'telefone' => 'required|min:10|max:80',
            'endereco' => 'required|min:10|max:80',

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
            
            'email.required'=> 'o campo email é obrigatorio',
            'email.min'=> 'o campo deve conter no minimo 10 caracteres',
            'email.max'=> 'o campo deve conter no maximo 80 caracteres',


           'telefone.required'=>'o campo telefone é obrigatorio',
           'telefone.min'=> 'o campo deve conter no minimo 10 caracteres',
            'telefone.max'=> 'o campo deve conter no maximo 80 caracteres',


            'endereco.required'=>'o campo endereco é obrigatorio',
           'endereco.min'=> 'o campo deve conter no minimo 10 caracteres',
            'endereco.max'=> 'o campo deve conter no maximo 80 caracteres'


        ];
}
};