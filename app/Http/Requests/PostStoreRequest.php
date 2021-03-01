<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'route_miniature' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Titulo',
            'content' => 'Descripcion',
        ];
    }

    public function messages()
    {
        return [
            'route_miniature.required' => 'Debe adjuntar la miniatura de la publicacion'
        ];
    }
}
