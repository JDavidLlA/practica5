<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SitioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|min:3|max:120',
            'url' => 'required|url|max:255',
            'categoria' => 'required|max:50',
            'descripcion' => 'nullable|max:500',
            'destacado' => 'nullable|boolean',
        ];
    }
}