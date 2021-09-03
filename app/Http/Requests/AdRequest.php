<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
        return [
            'title'=> 'required|min:3',
            'body'=> 'required|min:10|max:500',
            'price'=> 'required|numeric',
        ];
    }

    public function messages()
        {
            return [
                'title.required'=> __('ui.errore_titolo'),
                'body.required'=> __('ui.errore_descrizione'),
                'price.required'=>__('ui.errore_prezzo'),
                'price.numeric'=>__('ui.errore_numero'),
            ];
        }
}
