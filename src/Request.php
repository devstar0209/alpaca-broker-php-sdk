<?php namespace Alpaca;

use GuzzleHttp\Client;
use Alpaca\Response;
use Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

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

        try {
            // push request
            $options = [
                'headers' => [
                    'Content-Type' => '*/*',
                    'Accept' => '*/*',
                    'Authorization' => 'Basic '.$auth,
                ],
                'on_stats' => function (\GuzzleHttp\TransferStats $stats) use (&$seconds) {
                    $seconds = $stats->getTransferTime(); 
                 }
            ];
            if($type == 'GET' || $type == 'STREAM') $options['query'] = $params;
            else $options['json'] = $params;
            if($type == 'STREAM') {
                $context = stream_context_create($options);
                $fp = fopen($url, 'r', false, $context);
                return $fp;
            }
            $request = $this->client->request($type, $url, $options);
        }
         catch (ClientException  $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $erroObj = json_decode($responseBodyAsString);
            throw new Exception($erroObj->message);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $erroObj = json_decode($responseBodyAsString);
            throw new Exception($erroObj->message);
        }

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
