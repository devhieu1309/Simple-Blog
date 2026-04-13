<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTagRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên thẻ không được để trống.',
            'name.string' => 'Tên thẻ phải là chuỗi.',
            'name.max' => 'Tên thẻ không vượt quá 255 ký tự.'
        ];
    }
}
