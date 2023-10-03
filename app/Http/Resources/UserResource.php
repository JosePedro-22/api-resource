<?php

namespace App\Http\Resources;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private function showData($request, $value){
        if(!$request->headers->get('columns')) return true;

        return str($request->headers->get('columns'))->contains($value);
    }

    public function toArray(Request $request): array
    {
        $show = $request->headers->get('show') === 'all';

        return [
            'id' => $this->when(
                $this->showData($request, 'id'),
                $this->id),
            'name' => $this->when(
                $this->showData($request, 'name'),
                $this->name),
            'email' => $this->when(
                $this->showData($request, 'email'),
                $this->email),
            $this->mergeWhen($show, [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'subjects' => $this->subject->name,
            ]),
        ];
    }
}
