<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>['required','max:60','min:3'],
            'email'=>['required','max:50'],
            'senha'=>['required','min:8','confirmed'],
            'confirma_senha'=> ['required','min:8']
            //
        ];
        
    }
    public function messages(){
        return [
            'required'=>' O Campo :attribute é obrigatório',
            'max' => "O campo :attribute deve conter no máximo :max digitos",
            'min'=> 'O campo :attribute deve conter no mínimo :min digitos',
            'confirmed'=> 'é necessário confirmar a senha' 
        ];
    }
}
