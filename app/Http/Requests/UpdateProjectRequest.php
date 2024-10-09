<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            // 'name' => 'required|unique:projects|max:150',
            'name' => ['required', Rule::unique('projects')->ignore($this->project), 'max:150'],
            'description' => ['nullable', 'max:500'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'cover_project_image' => ['image', 'max:4084'],
            'type_id' => ['nullable', Rule::exists('types', 'id')],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Titolo obbligatorio',
            'name.unique' => 'Questo titolo esiste già',
            'name.max' => 'Superato il numero massimo di caratteri (150)',
            'description.max' => 'Superato il numero massimo di caratteri (500)',
            'start_date.required' => 'Data obbligatoria',
            'end_date.required' => 'Data obbligatoria',
            'cover_project_image.max' => 'Il file non deve superare i 4 MB',
            'type_id.exists' => 'Questa categoria non esiste',
        ];
    }
}
