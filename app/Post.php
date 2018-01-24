<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'article', 'author', 'image'];

	public static function valid(){
    	return array(
    		'comment' => 'required'
    	);
    }

    public function comment(){
    	return $this->hasMany('App\Comment', 'post_id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id');
    }
}
