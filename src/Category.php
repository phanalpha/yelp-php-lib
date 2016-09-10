<?php

namespace AzureSpring\Yelp;

class Category
{
    /**
     * @var float
     */
    private $name;

    /**
     * @var float
     */
    private $alias;


    public static function bless( $document )
    {
        return new Category( $document[0], $document[1] );
    }

    public function __construct( $name, $alias )
    {
        $this->name = $name;
        $this->alias = $alias;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAlias()
    {
        return $this->alias;
    }
}
