<?php namespace SmallTabs\Models\Partials;

class fSpecial {

	public $id;
	public $description;
	public $bar;
	public $day;
	public $type;

	public function __construct($id, $description, $bar, $day, $type) {
		$this->id = $id;
		$this->description = $description;
		$this->bar = $bar;
		$this->day = $day;
		$this->type = $type;
	}

}
