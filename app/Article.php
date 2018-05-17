<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Model implements Feedable
{
	protected $fillable = [
		'word_id', 'title', 'url', 'thumbnail' ,'view','description'
	];

	public function imagePath(){
		return env('APP_IMAGE').'images/'.$this->thumbnail;
	}

	public function thumbnailPath(){
		return env('APP_IMAGE').'thumbnail/'.$this->thumbnail;
	}

	public function path(){
		return url('/article/'.$this->id);
	}

	public function listpath(){
		return url('/article/list/'.$this->id);
	}

	public function word(){
		return $this->belongsTo('App\Word');
	}


	public function scopeLatest($query){
		return $query->orderBy('updated_at','desc');
	}
	public function scopePopular($query){
		return $query->orderBy('view','desc');
	}
	public function twitters(){
		return $this->hasMany('App\Twitter');
	}

	public function toFeedItem()
	{
		return FeedItem::create()
		->id($this->id)
		->title($this->title)
		->summary($this->description)
		->updated($this->updated_at)
		->link($this->path())
		->author(\Config::get('app.name'));
	}
	public static function getFeedItems()
	{
		return Article::orderBy('updated_at','desc')->take(5000)->get();
	}

}
