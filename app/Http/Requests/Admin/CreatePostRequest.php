<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags.*' => ['required', 'integer', 'exists:tags,id']
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Tiêu đề bài viết không được để trống.',
            'title.string' => 'Tiêu đề bài viết phải là chuỗi,',
            'title.max' => 'Tiêu đề bài viết không vượt quá 255 ký tự',
            'content.required' => 'Nội dung bài viết không được để trống.',
            'content.string' => 'Nội dung bài viết phải là chuỗi,',
            'content.max' => 'Nội dung bài viết không vượt quá 255 ký tự',
            'image.image' => 'File tải lên không hợp lý, vui lòng tải lên hình ảnh.',
            'category_id.required' => 'Danh mục bài viết chưa được chọn.',
            'category_id.integer' => 'Danh mục bài viết không hợp lệ.',
            'category_id.exists' => 'Danh mục bài viết không tồn tại.',
            'tags.*.required' => 'Tag bài viết chưa được chọn.',
            'tags.*.integer' => 'Tag bài viết không hợp lệ.',
            'tags.*.exists' => 'Tag bài viết không tồn tại.',
        ];
    }
}
