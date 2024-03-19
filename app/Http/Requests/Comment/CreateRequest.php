<?php

namespace App\Http\Requests\Comment;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'body' => ['required', 'min:1']
        ];
    }

    public function saveComment(Post $post):void
    {
        $post->comments()->create([
            ...$this->only('body'),
            'user_id' => auth()->id()
        ]);
    }
}
