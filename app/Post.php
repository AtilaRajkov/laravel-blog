<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $dates = [
    'created_at',
    'updated_at',
    'published_at'
  ];


  public function author()
  {
    return $this->belongsTo(User::class, 'user_id','id');
  }


  public function category()
  {
    return $this->belongsTo(Category::class);
  }


  public function getImageUrlAttribute()
  {
    $imageUrl = '';

    if (!is_null($this->image))
    {
      $imagePath = public_path() . '\img\\' . $this->image;
      if (file_exists($imagePath)) {
        $imageUrl = asset('img/' . $this->image);
      }
    }
    return $imageUrl;
  }


  public function getDateAttribute()
  {
    return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
  }


  public function getBodyHtmlAttribute()
  {
    return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
  }


  public function getExcerptHtmlAttribute()
  {
    return $this->excerpt ?
      Markdown::convertToHtml(e($this->excerpt)) : NULL;
  }


  public function scopeLatestFirst($query)
  {
    return $query->orderBy('created_at', 'desc');
  }


  public function scopePublished($query)
  {
    return $query->where('published_at', '!=', NULL)
      ->where('published_at', '<=', Carbon::now());
  }


}
