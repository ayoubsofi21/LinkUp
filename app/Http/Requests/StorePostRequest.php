<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:2048'],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'content.required' => 'The post content is required.',
            'content.min' => 'Your post must contain at least 10 characters.',

            'image.image' => 'The selected file must be an image.',
            'image.mimes' => 'Only JPEG, JPG, PNG, GIF and WEBP images are allowed.',
            'image.max' => 'The image size must not exceed 2 MB.',
        ];
    }
}