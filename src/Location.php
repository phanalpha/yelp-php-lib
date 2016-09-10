<?php

namespace AzureSpring\Yelp;

class Location
{
    /**
     * @var string[]
     */
    private $address;

    /**
     * @var string[]
     */
    private $display_address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state_code;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var string
     */
    private $country_code;

    /**
     * @var string
     */
    private $cross_streets;

    /**
     * @var string[]
     */
    private $neighborhoods;

    /**
     * @var Coordinate
     */
    private $coordinate;


    public static function bless( $document )
    {
        return new Location( $document->address,
                             $document->display_address,
                             $document->city,
                             $document->state_code,
                             $document->postal_code,
                             $document->country_code,
                             @$document->cross_streets,
                             @$document->neighborhoods,
                             Coordinate::bless($document->coordinate) );
    }

    public function __construct( $address,
                                 $display_address,
                                 $city,
                                 $state_code,
                                 $postal_code,
                                 $country_code,
                                 $cross_streets,
                                 array $neighborhoods = null,
                                 Coordinate $coordinate )
    {
        $this->address          = $address;
        $this->display_address  = $display_address;
        $this->city             = $city;
        $this->state_code       = $state_code;
        $this->postal_code      = $postal_code;
        $this->country_code     = $country_code;
        $this->cross_streets    = $cross_streets;
        $this->neighborhoods    = $neighborhoods;
        $this->coordinate       = $coordinate;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getDisplayAddress()
    {
        return $this->display_address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStateCode()
    {
        return $this->state_code;
    }

    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function getCountryCode()
    {
        return $this->country_code;
    }

    public function getCrossStreets()
    {
        return $this->cross_streets;
    }

    public function getNeighborhoods()
    {
        return $this->neighborhoods;
    }

    public function getCoordinate()
    {
        return $this->coordinate;
    }
}
