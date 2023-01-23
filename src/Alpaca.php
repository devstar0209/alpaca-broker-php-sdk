<?php namespace Alpaca;

use Alpaca\Api\Account;
use Alpaca\Api\Funding;
use Alpaca\Request;

class Alpaca
{

    /**
     * API key
     *
     * @var string
     */
    private $key;

    /**
     * API secret
     *
     * @var string
     */
    private $secret;
    
    /**
     * API version
     *
     * @var string
     */
    private $version = 'v1';

    /**
     * Use paper account (true/false)
     *
     * @var bool
     */
    private $paper;

    /**
     * API Paper Path
     *
     * @var array
     */
    private $apiPaperPath = 'https://broker-api.sandbox.alpaca.markets/';

    /**
     * API Real Path
     *
     * @var array
     */
    private $apiPath = 'https://broker-api.alpaca.markets/';

    /**
     * API Paths
     *
     * @var array
     */
    private $paths = [
        "accounts"     => "/accounts",
        "account"     => "/accounts/{account_id}",
        "trading_account"     => "/trading/accounts/{account_id}/account",
        "onfido_token"     => "/accounts/{account_id}/onfido/sdk/tokens",
        "update_onfido_token"     => "/accounts/{account_id}/onfido/sdk",
        "cip"     => "/accounts/{account_id}/cip",
        "activities"     => "/accounts/activities",
        "activities_type"     => "/accounts/activities/{activity_type}",
        "ach_relationships"     => "/accounts/{account_id}/ach_relationships",
    ];

    /**
     * @var \Alpaca\Api\Account
     */
    public $account ;

    /**
     * @var \Alpaca\Api\Funding
     */
    public $funding ;
    

    /**
     * Set Alpaca 
     *
     */
    public function __construct($key, $secret, $paper = false)
    {
        $this->setAuthKeys($key, $secret);

        $this->paper = $paper;

        $this->account = (new Account($this));
        $this->funding = (new Funding($this));
    }

    /**
     * setKey()
     *
     * @return self
     */
    public function setAuthKeys($key, $secret)
    {
        $this->key = $key;

        $this->secret = $secret;

        return $this;
    }

    /**
     * getAuthKeys()
     *
     * @return array
     */
    public function getAuthKeys()
    {
        return [$this->key, $this->secret];
    }

    /**
     * getRoot()
     *
     * @return string
     */
    public function getRoot()
    {
        if ($this->paper===true) {
            return $this->apiPaperPath.$this->version;
        }

        return $this->apiPath.$this->version;
    }

    /**
     * getPath()
     *
     * @return string
     */
    public function getPath($handle)
    {
        return $this->paths[$handle] ?? false;
    }
    
    /**
     * request()
     *
     * @return \Alpaca\Response
     */
    public function request($handle, $params = [], $type = 'GET')
    {
        return (new Request($this))->send($handle, $params, $type);
    }

    /**
     * account()
     *
     * @return \Alpaca\Account\Account
     */
    public function account()
    {
        return (new Account($this));
    }
}
