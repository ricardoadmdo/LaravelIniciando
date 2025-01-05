<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia a `false` si necesitas restringir el acceso.
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
            'language' => 'required|in:English,Spanish',
        ];
    }
}
