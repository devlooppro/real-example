<?php

namespace App\Http\Resources\Group;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class GroupResource
 * @package App\Http\Resources
 *
 * @property int $count_visits
 * @property int $group_messages_count
 * @property int $group_users_count
 */
class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /* @var Group|self $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'publicGroup' => $this->public_group,
            'status' => $this->status,
        ];
    }
}
