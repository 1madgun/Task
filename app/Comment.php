<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['post_id', 'komentar', 'komentator'];

    public static function valid(){
    	return array(
    		'comment' => 'required'
    	);
    }

    public function post(){
    	return $this->belongsTo('App\Post', 'post_id');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id');
    }
}