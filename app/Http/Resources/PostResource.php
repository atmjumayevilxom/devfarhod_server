<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'excerpt' => $this->excerpt,
            'status' => $this->status,
            'user' => new UserResource($this->user),
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.2',
            'author' => 'Nodirbek Ergashev'
        ];
    }
}
