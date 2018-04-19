<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
	protected $fillable = [
		'text'
	];

	public function articles(){
		return $this->hasMany('App\Article');
	}

	public function delete(){
		$this->articles()->delete();
		return parent::delete();
	}

	public function path(){
		return url('/word/'.$this->id);
	}
}
