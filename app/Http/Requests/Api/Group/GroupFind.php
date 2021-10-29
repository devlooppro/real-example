<?php

namespace App\Http\Requests\Api\Group;

use App\Http\Requests\Api\ApiBaseRequest;

/**
 * Class ArticleStoreRequest
 * @package App\Http\Requests\Api\Group
 *
 * @property string $find
 */
class GroupFind extends ApiBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'find' => ['string']
        ];
    }
}
