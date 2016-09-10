<?php

namespace AzureSpring\Yelp;

class GeographicCoordinate extends Coordinate
{
    /**
     * @var float
     */
    private $acc;               // accuracy

    /**
     * @var float
     */
    private $alt;               // altitude

    /**
     * @var float
     */
    private $alt_acc;


    public function __construct( $lat, $lng, $acc = null,
                                 $alt = null, $alt_acc = null )
    {
        parent::__construct( $lat, $lng );

        $this->acc = $acc;
        $this->alt = $alt;
        $this->alt_acc = $alt_acc;
    }

    public function getAcc()
    {
        return $this->acc;
    }

    public function getAlt()
    {
        return $this->alt;
    }

    public function getAltAcc()
    {
        return $this->alt_acc;
    }

    public function __toString()
    {
        return implode(',', [ parent::__toString($this),
                              $this->acc,
                              $this->alt,
                              $this->alt_acc ]);
    }

    public function compile()
    {
        return [ 'll' => (string) $this ];
    }
}
