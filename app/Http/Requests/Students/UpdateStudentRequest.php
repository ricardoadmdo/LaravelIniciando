<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|max:255',
            'email' => 'sometimes|email|unique:students,email,' . $this->route('id'),
            'phone' => 'sometimes|digits:10',
            'language' => 'sometimes|in:English,Spanish',
        ];
    }
}
