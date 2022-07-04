<?php

namespace App\Domains\Post\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'userId'    => ['nullable'],
            'status'    => ['nullable'],
            'isToday'   => ['nullable'],
            'sortField' => ['nullable'],
        ];
    }
}
