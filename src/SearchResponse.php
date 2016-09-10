<?php

namespace AzureSpring\Yelp;

class SearchResponse
{
    private $region;

    private $total;

    private $businesses;


    public static function bless( $document )
    {
        return new SearchResponse( Region::bless($document->region),
                                   $document->total,
                                   array_map(
                                       function ($d) {
                                           return Business::bless( $d );
                                       },
                                       $document->businesses
                                   ) );
    }

    public function __construct( Region $region, $total, array $businesses )
    {
        $this->region     = $region;
        $this->total      = $total;
        $this->businesses = $businesses;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getBusinesses()
    {
        return $this->businesses;
    }
}
