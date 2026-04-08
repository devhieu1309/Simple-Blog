<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostFormRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required|min:1000',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif'

        ];
    }

    public function messages() {
        return [
            'title.required' => 'Vui lòng nhập tên bài viết.',
            'title.max' => 'Tên bài viết không vượt quá 255 ký tự.',
            'content.required' => 'Vui lòng nhập nội dung bài viết.',
            'content.min' => 'Nội dung bài viết quá ngắn, phải trên 1000 ký tự.',
            'image.required' => 'Vui lòng chọn ảnh bài viết',
            'image.image' => 'Vui lòng chọn đúng file ảnh.',
            'image.mimes' => 'Vui lòng chọn ảnh dạng JPG, JPEG, PNG hoặc GIF.',
        ];
    }
}
