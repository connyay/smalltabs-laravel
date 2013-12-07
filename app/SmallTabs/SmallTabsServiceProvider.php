<?php namespace SmallTabs;

use Illuminate\Support\ServiceProvider;
use Config;

class SmallTabsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot() {
		$this->bindRepositories();
		$this->bindFacades();
		$this->bindRoutes();
	}

	/**
	 * Bind repositories.
	 *
	 * @return  void
	 */
	protected function bindRepositories() {
		$this->app->singleton( 'SmallTabs\Repositories\BarRepositoryInterface', 'SmallTabs\Repositories\DbBarRepository' );
		$this->app->singleton( 'SmallTabs\Repositories\SpecialRepositoryInterface', 'SmallTabs\Repositories\DbSpecialRepository' );
	}

	/**
	 * Bind facades.
	 *
	 * @return  void
	 */
	protected function bindFacades() {
		$this->app->bind( 'SmallTabs', function() {
				return new \SmallTabs\Facades\SmallTabs();
			} );
	}

	/**
	 * Bind routes.
	 *
	 * @return  void
	 */
	protected function bindRoutes() {
		require __DIR__ . '/Routes/ApiRoutes.php';
	}

	public function register() {}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}
