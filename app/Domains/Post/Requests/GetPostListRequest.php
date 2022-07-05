<?php

namespace App\Domains\Post\Requests;

use App\Enums\PostSortFieldEnum;
use App\Enums\PostSortOrderEnum;
use App\Enums\PostStatusEnum;
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
            'userId'    => ['nullable', 'array'],
            'userId.*'  => ['integer'],
            'status'    => ['array'],
            'status.*'  => ['string', Rule::in(PostStatusEnum::getKeys())],
            'isToday'   => ['nullable', 'boolean'],
            'sortField' => ['nullable', Rule::in(PostSortFieldEnum::getKeys())],
            'sortOrder' => ['nullable', Rule::in(PostSortOrderEnum::getKeys())],
        ];
    }
}
