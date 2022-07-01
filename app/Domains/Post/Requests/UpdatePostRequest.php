<?php

namespace App\Domains\Post\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
       if(auth()->user()->can('update', $this->post)) {
           return true;
       }
       return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:225'],
            'description' => ['required', 'string'],
            'status' => ['required'],
            'img' => ['required', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048']
        ];
    }
}
