<?php

namespace App\Http\Resources;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        dd($request);
        $show = $request->headers->get('show') === 'all';
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            $this->mergeWhen($show, [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,  
                'subjects' => $this->whenLoaded('subject'),
            ]),            
        ];
    }
}
