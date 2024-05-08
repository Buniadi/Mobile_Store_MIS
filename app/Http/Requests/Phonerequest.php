<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class phoneRequest extends FormRequest
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
            'company' => 'required|string',
            'model' => 'required|string',
            'battery_level' => 'required|string',
            'ram' => 'required|string',
            'face' => 'required|string',
            'powertype' => 'required|string',
            'memory' => 'required|string',
            'camera_quantity' => 'required|string',
            // 'photo' => 'string|max:50',
            'pexel' => 'required|string',
        ];
    }
}
