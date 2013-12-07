<?php namespace SmallTabs\Models;

class Neighborhood extends BaseModel {

	protected $fillable = array( 'name', 'note' );
	public $timestamps = false;

	public function bars() {
		return $this->hasMany( 'SmallTabs\Models\Bar' );
	}

	public function link() {
		return link_to_route('neighborhood.show', $this->name, array('name'=>$this->name));
	}

	public function cleanNote() {
		return (isset($this->note) && !empty($this->note)) ? strip_tags($this->note) : "";
	}
}
