<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResourceDetail extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'title' => $this->title,
      'slug' => $this->slug,
      'user_id' => $this->user_id,
      'content' => $this->content,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
      'published_at' => $this->published_at
    ];
  }
}
