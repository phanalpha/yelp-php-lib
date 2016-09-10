<?php

namespace AzureSpring\Yelp;

use GuzzleHttp\Client as Guzzle;

class Client
{
    const YELP_SEARCH = 'https://api.yelp.com/v2/search';
    const NR_RAND_BYTES = 21;

    private $guzzle;

    private $consumer_key;

    private $consumer_secret;

    private $token;

    private $token_secret;


    public function __construct( Guzzle $guzzle,
                                 $consumer_key,
                                 $consumer_secret,
                                 $token,
                                 $token_secret )
    {
        $this->guzzle           = $guzzle;
        $this->consumer_key     = $consumer_key;
        $this->consumer_secret  = $consumer_secret;
        $this->token            = $token;
        $this->token_secret     = $token_secret;
    }

    public function search( SearchParams $search_params )
    {
        $params   = $this->sign( 'GET', self::YELP_SEARCH, $search_params->compile() );
        $response = $this->guzzle->get(self::YELP_SEARCH, [ 'query' => $params ]);
        $document = json_decode( $response->getBody() );

        return SearchResponse::bless( $document );
    }

    private function sign( $method, $url, array $params )
    {
        $nonce  = openssl_random_pseudo_bytes(self::NR_RAND_BYTES);
        $params = array_merge(
            $params,
            ['oauth_consumer_key' => $this->consumer_key,
             'oauth_token' => $this->token,
             'oauth_signature_method' => 'HMAC-SHA1',
             'oauth_nonce' => strtr(base64_encode($nonce), '+/', '-_'),
             'oauth_timestamp' => time()]
        );

        ksort($params);
        $text = implode('&', array_map('rawurlencode', [
            $method,
            $url,
            implode('&', array_map(
                function ($k, $v) {
                    return implode('=', [ rawurlencode($k), rawurlencode($v) ]);
                },
                array_keys($params),
                array_values($params)
            ))
        ]));
        $key = implode('&', [$this->consumer_secret, $this->token_secret]);
        $signature = hash_hmac('sha1', $text, $key, true);

        return array_merge($params, [
            'oauth_signature' => base64_encode($signature)
        ]);
    }
}
