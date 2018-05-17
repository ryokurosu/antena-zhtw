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
		->title($this->utf8_encode_callback($this->title))
		->summary($this->utf8_encode_callback($this->description))
		->updated($this->updated_at)
		->link($this->path())
		->author(\Config::get('app.name'));
	}
	public static function getFeedItems()
	{
		return Article::all();
	}

	public function fix_latin1_mangled_with_utf8_maybe_hopefully_most_of_the_time($str)
	{
		return preg_replace_callback('#[\\xA1-\\xFF](?![\\x80-\\xBF]{2,})#', 'utf8_encode_callback', $str);
	}

	public function utf8_encode_callback($m)
	{
		return utf8_encode($m[0]);
	}

}
