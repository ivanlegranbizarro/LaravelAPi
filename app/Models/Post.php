<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'content',
  ];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($post) {
      $post->slug = Str::slug($post->title);
      $post->user_id = auth()->id();
    });
  }

  public function getExcerptAttribute()
  {
    return substr($this->content, 0, 100);
  }

  public function getPublishedAtAttribute()
  {
    return $this->created_at->diffForHumans();
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
