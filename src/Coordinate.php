<?php

namespace AzureSpring\Yelp;

class Coordinate
{
    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lng;


    public static function bless( $document, $format = '%s' )
    {
        return new Coordinate( $document->{ sprintf($format, 'latitude') },
                               $document->{ sprintf($format, 'longitude') } );
    }

    public function __construct( $lat, $lng )
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function __toString()
    {
        return implode(',', [ $this->lat, $this->lng ]);
    }

    public function compile()
    {
        return [ 'cll' => (string) $this ];
    }
}
