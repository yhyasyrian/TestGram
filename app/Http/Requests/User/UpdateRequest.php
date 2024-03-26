<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'username' => ['required', 'string', 'max:255', 'min:5', Rule::unique('users')->ignore($this->user())],
            'image' => ['nullable', 'mimetypes:image/gif,image/png,image/webp,image/jpeg', 'mimes:gif,png,webp,jpeg', 'extensions:gif,png,webp,jpeg'],
            'bio' => ['nullable', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'max:255', 'confirmed'],
        ];
    }

    public function update(User $user): void
    {
        $data = $this->safe()->collect();
        if ($this->has('image')) {
            $data['image'] = $this->file('image')->store('users', 'public');
        } else {
            unset($data['image']);
        }
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $data['is_private'] = $this->has('is_private');
        $user->update($data->toArray());
    }
}
