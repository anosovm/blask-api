<?php

namespace App\Http\Resources;

use App\Models\User;

class Performer extends AbstractResource
{
    public function toArray($request): array
    {
        /** @var User $user */
        $user = $this->resource;

        return [
            'id'        => $user->id,
            'name'      => $user->name,
        ];
    }
}
