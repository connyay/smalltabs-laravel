<?php namespace SmallTabs\Models;

class Special extends BaseModel {

	protected $fillable = array( 'description', 'type', 'day', 'bar_id' );

	protected $touches = array( 'bar' );

	public function bar() {
		return $this->belongsTo( 'SmallTabs\Models\Bar' );
	}
}
