<?php

namespace App\Http\Requests\Api\Group;

use App\Http\Requests\Api\ApiBaseRequest;

/**
 * Class GroupUserStore
 * @package App\Http\Requests\Api\Group
 *
 * @property array $users_id
 */
class GroupAddUsersStore extends ApiBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'users_id' => ['required', 'array'],
            'users_id.*' => ['int', 'distinct', 'exists:users,id'],
        ];
    }
}
