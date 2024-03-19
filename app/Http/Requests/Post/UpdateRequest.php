<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'image' => ['mimetypes:image/gif,image/png,image/webp,image/jpeg', 'mimes:gif,png,webp,jpeg', 'extensions:gif,png,webp,jpeg']
        ];
    }

    public function saveUpdatePost(Post $post): void
    {
        $data = ['description' => $this->get('description') ?? ''];
        if ($this->has('image')) {
            $data['image'] = $this->file('image')->store('post','public');
        }
        $post->update($data);
    }
}
