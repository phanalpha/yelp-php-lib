<?php

namespace AzureSpring\Yelp;

class SearchParams
{
    const BEST_MATCHED  = 0;
    const DISTANCE      = 1;
    const HIGHEST_RATED = 2;

    /**
     * @var string
     */
    private $term;

    /**
     * @var integer
     */
    private $limit;

    /**
     * @var integer
     */
    private $offset;

    /**
     * @var integer
     */
    private $sort;

    /**
     * @var string[]
     */
    private $category_filter;

    /**
     * @var integer
     */
    private $radius_filter;

    /**
     * @var boolean
     */
    private $deals_filter;

    /**
     * @var string|Coordinate|Bounds|GeographicCoordinate
     */
    private $location;

    /**
     * @var string ISO 3166-1 alpha-2 country code
     */
    private $country_code;

    /**
     * @var string ISO 639 language code
     */
    private $language_code;

    /**
     * @var boolean
     */
    private $actionlinks;


    public function setTerm( $term )
    {
        $this->term = $term;

        return $this;
    }

    public function setLimit( $limit )
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOffset( $offset )
    {
        $this->offset = $offset;

        return $this;
    }

    public function setSort( $sort )
    {
        $this->sort = $sort;

        return $this;
    }

    public function setCategoryFilter( array $category_filter )
    {
        $this->category_filter = $category_filter;

        return $this;
    }

    public function setRadiusFilter( $radius_filter )
    {
        $this->radius_filter = $radius_filter;

        return $this;
    }

    public function setDealsFilter( $deals_filter )
    {
        $this->deals_filter = $deals_filter;

        return $this;
    }

    public function setLocation( $location )
    {
        $this->location = $location;

        return $this;
    }

    public function setCountryCode( $country_code )
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function setLanguageCode( $language_code )
    {
        $this->language_code = $language_code;

        return $this;
    }

    public function setActionlinks( $actionlinks )
    {
        $this->actionlinks = $actionlinks;
    }

    /**
     * @return [string](string|integer)
     */
    public function compile()
    {
        $params = [];

        if ( !empty($this->term) )
            $params['term'] = $this->term;
        if ( !empty($this->limit) )
            $params['limit'] = $this->limit;
        if ( !empty($this->offset) )
            $params['offset'] = $this->offset;
        if ( !empty($this->sort) )
            $params['sort'] = $this->sort;
        if ( !empty($this->category_filter) )
            $params['category_filter'] = implode(',', $this->category_filter);
        if ( !empty($this->radius_filter) )
            $params['radius_filter'] = $this->radius_filter;
        if ( !empty($this->deals_filter) )
            $params['deals_filter'] = 'true';
        if ( !empty($this->location) )
            $params = array_merge( $params,
                                   is_string($this->location) ?
                                   ['location' => $this->location] :
                                   $this->location->compile() );
        if ( !empty($this->country_code) )
            $params['cc'] = $this->country_code;
        if ( !empty($this->language_code) )
            $params['lang'] = $this->language_code;
        if ( !empty($this->actionlinks) )
            $params['actionlinks'] = 'true';

        return $params;
    }
}
