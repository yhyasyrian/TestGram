<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateRequest extends FormRequest
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
            'image' => ['required','mimetypes:image/gif,image/png,image/webp,image/jpeg','mimes:gif,png,webp,jpeg','extensions:gif,png,webp,jpeg']
        ];
    }
    public function savePost():void
    {
        $result = [
            'description' => $this->get('description') ?? '',
            'image' => 'storage/'.$this->file('image')->store('post','public'),
            'slug' => Str::random(64)
        ];
        auth()->user()->posts()->create($result);
    }
}
