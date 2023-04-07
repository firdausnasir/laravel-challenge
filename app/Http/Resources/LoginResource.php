<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user'  => $this->resource->only('id', 'name', 'email', 'email_verified_at', 'created_at'),
            'token' => $this->resource->createToken('authToken')->plainTextToken,
        ];
    }
}
