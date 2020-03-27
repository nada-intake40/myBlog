<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
 use Sluggable;

 protected $fillable=[
      'title',
      'description',
      'user_id'
 ];

 public function user()
 {
     return $this->belongsTo('App\User');
 }

 public function sluggable()
 {
     return [
         'slug' => [
             'source' => 'title'
         ]
     ];
 }

}
