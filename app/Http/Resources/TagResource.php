<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parent = Tag::find($this->parent_id);
        $parentData = [];
        if (!is_null($parent)) {
            $parentData = [
                'id' => $parent->id,
                'name' => $parent->name,
                'slug' => $parent->slug,
                'created_at' => $parent->created_at,
                'updated_at' => $parent->updated_at,
                'deleted_at' => $parent->deleted_at
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'parent' => $parentData,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
