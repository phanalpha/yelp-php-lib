<?php

namespace AzureSpring\Yelp;

class Business
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var boolean
     */
    private $is_claimed;

    /**
     * @var boolean
     */
    private $is_closed;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $image_url;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $mobile_url;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $display_phone;

    /**
     * @var integer
     */
    private $review_count;

    /**
     * @var Category[]
     */
    private $categories;

    /**
     * @var float
     */
    private $rating;

    /**
     * @var string
     */
    private $rating_img_url;

    /**
     * @var string
     */
    private $rating_img_url_small;

    /**
     * @var string
     */
    private $rating_img_url_large;

    /**
     * @var string
     */
    private $snippet_text;

    /**
     * @var string
     */
    private $snippet_image_url;

    /**
     * @var Location
     */
    private $location;


    public static function bless( $document )
    {
        return new Business( $document->id,
                             $document->is_claimed,
                             $document->is_closed,
                             $document->name,
                             @$document->image_url,
                             $document->url,
                             $document->mobile_url,
                             @$document->phone,
                             @$document->display_phone,
                             $document->review_count,
                             array_map(
                                 function ($d) {
                                     return Category::bless( $d );
                                 },
                                 $document->categories
                             ),
                             $document->rating,
                             $document->rating_img_url,
                             $document->rating_img_url_small,
                             $document->rating_img_url_large,
                             $document->snippet_text,
                             $document->snippet_image_url,
                             Location::bless($document->location) );
    }

    public function __construct( $id,
                                 $is_claimed,
                                 $is_closed,
                                 $name,
                                 $image_url,
                                 $url,
                                 $mobile_url,
                                 $phone,
                                 $display_phone,
                                 $review_count,
                                 array $categories,
                                 $rating,
                                 $rating_img_url,
                                 $rating_img_url_small,
                                 $rating_img_url_large,
                                 $snippet_text,
                                 $snippet_image_url,
                                 Location $location )
    {
        $this->id                   = $id;
        $this->is_claimed           = $is_claimed;
        $this->is_closed            = $is_closed;
        $this->name                 = $name;
        $this->image_url            = $image_url;
        $this->url                  = $url;
        $this->mobile_url           = $mobile_url;
        $this->phone                = $phone;
        $this->display_phone        = $display_phone;
        $this->review_count         = $review_count;
        $this->categories           = $categories;
        $this->rating               = $rating;
        $this->rating_img_url       = $rating_img_url;
        $this->rating_img_url_small = $rating_img_url_small;
        $this->rating_img_url_large = $rating_img_url_large;
        $this->snippet_text         = $snippet_text;
        $this->snippet_image_url    = $snippet_image_url;
        $this->location             = $location;
    }

    public function getId()
    {
        return $this->id;
    }

    public function isClaimed()
    {
        return $this->is_claimed;
    }

    public function isClosed()
    {
        return $this->is_closed;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImageUrl()
    {
        return $this->image_url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMobileUrl()
    {
        return $this->mobile_url;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getDisplayPhone()
    {
        return $this->display_phone;
    }

    public function getReviewCount()
    {
        return $this->review_count;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getRatingImgUrl()
    {
        return $this->rating_img_url;
    }

    public function getRatingImgUrlSmall()
    {
        return $this->rating_img_url_small;
    }

    public function getRatingImgUrlLarge()
    {
        return $this->rating_img_url_large;
    }

    public function getSnippetText()
    {
        return $this->snippet_text;
    }

    public function getSnippetImageUrl()
    {
        return $this->snippet_image_url;
    }

    public function getLocation()
    {
        return $this->location;
    }
}
