<?php

namespace AzureSpring\Yelp;

class Region
{
    private $span;

    private $center;


    public static function bless( $document )
    {
        return new Region( Coordinate::bless($document->span, '%s_delta'),
                           Coordinate::bless($document->center) );
    }

    public function __construct( Coordinate $span, Coordinate $center )
    {
        $this->span = $span;
        $this->center = $center;
    }

    public function getSpan()
    {
        return $this->span;
    }

    public function getCenter()
    {
        return $this->center;
    }
}
