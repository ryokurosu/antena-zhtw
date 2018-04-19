<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
	protected $fillable = [
		'article_id', 'user_id','tweet_id','text'
	];

	public function imagePath(){
		return env('APP_IMAGE').'thumbnail/'.$this->image;
	}

	public function userLink(){
		return 'https://twitter.com/'.$this->user_id;
	}


	public function tweetLink(){
		return 'https://twitter.com/'.$this->user_id.'/status/'.$this->tweet_id;
	}
}
