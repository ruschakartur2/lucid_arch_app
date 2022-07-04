<?php

namespace App\Domains\Post\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPostListRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'userId'   => ['nullable'],
            'status'   => ['nullable'],
            'isToday'  => ['nullable'],
            'byDate'   => ['nullable', 'max:4'],
            'byStatus' => ['nullable', 'max:4'],
        ];
    }
}
