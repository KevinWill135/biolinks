<?php

namespace App\Http\Requests;

use App\Rules\CheckHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

/**
 * @property-read UploadFile $photo
 */

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:100'],
            'description' => ['nullable'],
            'photo' => ['nullable', 'image'],
            'handler' => [
                'required',
                //'unique:users,handler,' . $this->user()->id,
                Rule::unique('users')->ignoreModel($this->user()),
                new CheckHandler,
            ],
        ];
    }
}
