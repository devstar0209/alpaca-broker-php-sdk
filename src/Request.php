<?php namespace Alpaca;

use GuzzleHttp\Client;
use Alpaca\Response;

class Request
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $alpaca;

    /**
     * Guzzle Client
     *
     * @return GuzzleHttp\Client
     */
    private $client;

    /**
     * Start the class()
     *
     */
    public function __construct(Alpaca $alpaca, $timeout = 4)
    {
        $this->alpaca = $alpaca;

        $this->client = new Client([
            'base_uri' => $this->alpaca->getRoot(),
            'timeout'  => $timeout
        ]);
    }

    /**
     * send()
     *
     * Send request
     *
     * @return \Alpaca\Response
     */
    public function send($handle, $params = [], $type = 'GET')
    {
        // build and prepare our full path rul
        $url = $this->prepareUrl($handle, $params);

        // lets track how long it takes for this request
        $seconds = 0;

        $auth = base64_encode($this->alpaca->getAuthKeys()[0].':'.$this->alpaca->getAuthKeys()[1]);

        // push request
        $request = $this->client->request($type, $url, [
            'json' => $params,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic '.$auth,
            ],
            'on_stats' => function (\GuzzleHttp\TransferStats $stats) use (&$seconds) {
                $seconds = $stats->getTransferTime(); 
             }
        ]);

        // send and return the request response
        return (new Response($request, $seconds));
    }

    /**
     * prepareUrl()
     *
     * Get and prepare the url
     *
     * @return string
     */
    private function prepareUrl($handle, $segments = [])
    {
        $url = $this->alpaca->getPath($handle);

        foreach($segments as $segment=>$value) {
            if (gettype($value) == 'string') {
                $url = str_replace('{'.$segment.'}', $value, $url);
                $url = str_replace(':'.$segment, $value, $url);
            }
        }

        return $url;
    }
}
