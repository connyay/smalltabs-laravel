<?php namespace SmallTabs\Models;

class SpecialType extends BaseModel {
	public function special() {
		return $this->belongsTo( 'SmallTabs\Models\Special' );
	}
}
