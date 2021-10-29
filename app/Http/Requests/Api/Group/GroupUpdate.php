<?php

namespace App\Http\Requests\Api\Group;

use App\Http\Requests\Api\ApiBaseRequest;

/**
 * Class ArticleStoreRequest
 * @package App\Http\Requests\Api\Articles
 *
 * @property string $name
 * @property string $public_channel
 * @property string $avatar
 * @property string $description
 */
class GroupUpdate extends ApiBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'public_group' => ['boolean'],
            'avatar' => ['nullable', 'string'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
