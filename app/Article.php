<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
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
}
