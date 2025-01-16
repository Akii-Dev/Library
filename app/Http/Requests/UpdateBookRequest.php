<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
                'title' => [
                    'required',
                    'string',
                    'max:50',
                    Rule::unique('books')->where(function ($query) {
                        return $query->where('author', $this->input('author'));
                    })->ignore($this->route('book')->id),
                ],
                'author' => ['required', 'string', 'max:50'],
                'read_at' => ['nullable', 'date']
            
        ];
    }

    public function messages(): array
    {
        return ['title.unique' => 'This book is already in your library'];
    }
}
