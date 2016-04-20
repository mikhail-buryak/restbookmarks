<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {

	protected $table = 'bookmarks';

	protected $fillable = [];

	protected $dates = [];

	public static $rules = [
		// Validation rules
	];

	public function comments()
	{
		return $this->hasMany('App\Comments');
	}
}
