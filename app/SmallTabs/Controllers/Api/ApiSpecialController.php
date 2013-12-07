<?php namespace SmallTabs\Controllers\Api;

use Auth, Controller, Carbon\Carbon, SmallTabs, Str;
use Illuminate\Support\Facades\Response;
use SmallTabs\Repositories\SpecialRepositoryInterface;

class ApiSpecialController extends BaseApiController {

    /**
     * The bar repository implementation.
     *
     * @var specials
     */
    protected $specials;

    /**
     * Create a new API Bar controller.
     *
     * @param SpecialRepositoryInterface $specials
     *
     * @return ApiSpecialController
     */
    public function __construct( SpecialRepositoryInterface $specials ) {
        $this->specials = $specials;
    }

    public function day( $day = null ) {
        if ( is_null( $day ) ) {
            $current = Carbon::now()->dayOfWeek;
            $day = SmallTabs::getDay( $current );
        } else {
            $day = Str::title( $day );
            $current = SmallTabs::getDay( $day );
        }
        $specials = $this->specials->day( $current );
        $output['day'] = $day;
        $output['results'] = $this->apiFormat( $specials );
        return Response::json( $output  );
    }

    public function neighborhood( $day, $neighborhood ) {
        $neighborhood = Str::title( $neighborhood );
        $day = Str::title( $day );
        $current = SmallTabs::getDay( $day );
        $specials = $this->specials->day( $current, $neighborhood );
        $output['day'] = $day;
        $output['results'] = $this->apiFormat( $specials );
        return Response::json( $output  );
    }

    private function apiFormat( $specials ) {
        $output = [];
        $fSpecials = SmallTabs::formatDaySpecials( $specials );
        foreach ( $fSpecials->specials as $fSpecial ) {
            $special = [];
            $bar = $fSpecial['bar'];
            $special['bar'] = array( 'name'=>$bar->name, 'address'=>$bar->address,
                'phonenumber' => $bar->phonenumber,
                'neighborhood'=>array( 'name'=>$bar->neighborhood->name,
                    'note'=>$bar->neighborhood->cleanNote() ), 'specials'=>[] );

            if ( isset( $bar['Food'] ) ) {
                $this->cleanSpecial( $bar['Food'] );
                $special['bar']['specials']['Food'] = $bar['Food'];
            }
            if ( isset( $bar['Drink'] ) ) {
                $this->cleanSpecial( $bar['Drink'] );
                $special['bar']['specials']['Drink'] = $bar['Drink'];
            }
            if ( isset( $bar['Event'] ) ) {
                $this->cleanSpecial( $bar['Event'] );
                $special['bar']['specials']['Event'] = $bar['Event'];
            }
            $output[] = $special;
        }
        return $output;
    }

    private function cleanSpecial( &$special ) {
        unset( $special->id, $special->bar, $special->day, $special->type );
    }
}
