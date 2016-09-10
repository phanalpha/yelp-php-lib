<?php

namespace AzureSpring\Yelp;

class Bounds
{
    private $sw;

    private $ne;


    public function __construct( Coordinate $sw,
                                 Coordinate $ne )
    {
        $this->sw = $sw;
        $this->ne = $ne;
    }

    public function getSW()
    {
        return $this->sw;
    }

    public function getNE()
    {
        return $this->ne;
    }

    public function __toString()
    {
        return implode('|', [ $this->sw, $this->ne ]);
    }

    public function compile()
    {
        return [ 'bounds' => (string) $this ];
    }
}
