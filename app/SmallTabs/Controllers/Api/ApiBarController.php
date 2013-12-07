<?php namespace SmallTabs\Controllers\Api;

use Auth, Controller, SmallTabs;
use Illuminate\Support\Facades\Response;
use SmallTabs\Repositories\BarRepositoryInterface;

class ApiBarController extends BaseApiController {

    /**
     * The bar repository implementation.
     *
     * @var bars
     */
    protected $bars;

    /**
     * Create a new API Bar controller.
     *
     * @param BarRepositoryInterface $bars
     *
     * @return ApiBarController
     */
    public function __construct( BarRepositoryInterface $bars ) {
        $this->bars = $bars;
    }

    /**
     * Display one bar.
     *
     * @return Response
     */
    public function show( $id ) {
        $bar = $this->bars->find( $id );
        $this->apiFormat( $bar );
        return Response::json( $bar  );
    }

    /**
     * Display one bar.
     *
     * @return Response
     */
    public function showSlug( $slug ) {
        $bar = $this->bars->slug( $slug );
        $this->apiFormat( $bar );
        return Response::json( $bar  );
    }

    private function apiFormat( &$bar ) {
        $bar["link"] = route('bar.show', $bar->slug);
        $bar["last_updated"] = $bar->lastUpdated();
        unset( $bar["neighborhood_id"], $bar["updated_at"],
            $bar["created_at"], $bar->neighborhood["id"], $bar["slug"] );

        foreach ( $bar->specials as $special ) {
            $special->type = SmallTabs::getType( $special->type );
            $special->day = SmallTabs::getDay( (int)$special->day );
            unset( $special["id"], $special["starts_at"],
                $special["ends_at"], $special["created_at"],
                $special["updated_at"], $special["bar_id"] );
        }
        $bar->neighborhood["note"] = $bar->neighborhood->cleanNote();
    }

}
