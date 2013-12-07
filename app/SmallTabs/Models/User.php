<?php namespace SmallTabs\Models;

use Illuminate\Auth\UserInterface;

class User extends BaseModel implements UserInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The database connection used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'mysql';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password' );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this->password;
	}

}
