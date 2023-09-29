<?php

namespace App\Http\Resources;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $show = $request->headers->get('show') === 'all';
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->when( $show, $this->created_at),
            'updated_at' => $this->when( $show, $this->updated_at),
        ];
    }
}
