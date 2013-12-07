<?php namespace SmallTabs\Models;

class Day extends BaseModel {
	public function special() {
		return $this->belongsTo( 'SmallTabs\Models\Special' );
	}
}
