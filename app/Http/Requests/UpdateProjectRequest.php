<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_prog' => ['required', 'string', 'max:30'],
            'repo' => ['required', 'string', 'max:50'],
            'link' => ['required', 'url',],
            'description' => ['nullable', 'string'],
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id'],


        ];
    }

    public function messages()
    {
        return [
            'name_prog.required' => 'Il nome è obbligatorio',
            'name_prog.string' => 'Il nome deve essere una stringa',
            'name_prog.max' => 'Il nome deve essere massimo di 30 caratteri',

            'repo.required' => 'La repo è obbligatorio',
            'repo.string' => 'La repo deve essere una stringa',
            'repo.max' => 'La repo deve essere massimo di 50 caratteri',

            'link.required' => 'Il link è obbligatorio',
            'link.url' => 'Il link deve essere un URL',

            'description.string' => 'La descrizione deve essere una stringa',

            'type_id.exists' => 'La parte di sviluppo scelta non è valida',

            'technologies.exists' => 'Le parti di tecnologie scelte non sono valide',


        ];
    }
}