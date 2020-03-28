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
            'post_id'=>$this->id,
            'posted_by'=> $this->user_id,
            'title'=>$this->title,
            'description'=>$this->description,
            'user_info'=>$this->user,
            // 'user_info'=> new UserResource($this->user),
        ];
    }
}
