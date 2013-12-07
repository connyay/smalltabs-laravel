<?php namespace SmallTabs\Models;

use Str;

class Bar extends BaseModel {

	protected $fillable = array( 'name', 'slug', 'address', 'phonenumber', 'website', 'facebook', 'twitter', 'yelp', 'neighborhood_id' );

	public function neighborhood() {
		return $this->belongsTo( 'SmallTabs\Models\Neighborhood' );
	}

	public function specials() {
		return $this->hasMany( 'SmallTabs\Models\Special' );
	}

	public function lastUpdated() {
		return \Carbon\Carbon::createFromTimeStamp( strtotime( $this->updated_at ) )->diffForHumans();
	}

	public function link() {
		return link_to_route( 'bar.show', $this->name, array( 'slug'=>$this->slug ) );
	}

	public function location() {
		$location = '';
		$neighborhoodName = $this->neighborhood->name;
		if ( !is_null( $neighborhoodName ) ) {
			$location .= $neighborhoodName .= ' @ ';
		}
		$location .= $this->address;
		return Str::upper( $location );
	}

	public function number( $separator = '') {
		if ( !empty( $this->phonenumber ) ) {
			return $separator . link_to( 'tel:'.$this->phonenumber, $this->phonenumber, array( 'title'=>'Call '.$this->name ) );
		}
	}
}
