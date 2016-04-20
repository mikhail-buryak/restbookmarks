<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = 'comments';

	protected $fillable = [];

	protected $dates = [];

	public static $rules = [
		// Validation rules
	];

	public function bookmark()
	{
		return $this->belongsTo('App\Bookmark');
	}
}
