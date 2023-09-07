<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
      'user_id' => $this->user_id,
      'excerpt' => $this->excerpt,
      'published_at' => $this->published_at
    ];
  }
}
