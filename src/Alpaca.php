<?php namespace Alpaca;

use Alpaca\Api\Account;
use Alpaca\Api\Asset;
use Alpaca\Api\Document;
use Alpaca\Api\Events;
use Alpaca\Api\Funding;
use Alpaca\Api\Trade;
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
        "ach_relationships_delete"     => "/accounts/{account_id}/ach_relationships/{relationship_id}",
        "recipient_banks"     => "/accounts/{account_id}/recipient_banks",
        "recipient_banks_delete"     => "/accounts/{account_id}/recipient_banks/{bank_id}",
        "jit_limits"     => "/transfers/jit/limits",
        "jit_ledgers"     => "/transfers/jit/ledgers",
        "jit_balances"     => "/transfers/jit/{ledger_id}/balances",
        "transfers"     => "/accounts/{account_id}/transfers",
        "transfers_delete"     => "/accounts/{account_id}/transfers/{transfer_id}",
        "documents"     => "/accounts/{account_id}/documents",
        "documents_id"     => "/accounts/{account_id}/documents/{document_id}",
        "document_upload"     => "/accounts/{account_id}/documents/upload",
        "document_download"     => "/accounts/{account_id}/documents/{document_id}/download",
        "orders"     => "/trading/accounts/{account_id}/orders",
        "orders_esti"     => "/trading/accounts/{account_id}/orders/estimation",
        "orders_id"     => "/trading/accounts/{account_id}/orders/{order_id}",
        "orders_client"     => "/trading/accounts/{account_id}/orders:by_client_order_id",
        "positions"     => "/trading/accounts/{account_id}/positions",
        "positions_symbol"     => "/trading/accounts/{account_id}/positions/{symbol}",
        "positions_all"     => "/accounts/positions",
        "portfolio"     => "/trading/accounts/{account_id}/account/portfolio/history",
        "watchlists"     => "/trading/accounts/{account_id}/watchlists",
        "watchlists_id"     => "/trading/accounts/{account_id}/watchlists/{watchlist_id}",
        "watchlists_symbol"     => "/trading/accounts/{account_id}/watchlists/{watchlist_id}/{symbol}",
        "set_margin"     => "/trading/accounts/{account_id}/account/configurations",
        "assets" => "/assets",
        "assets_symbol" => "/assets/:symbol",
        "assets_id" => "/assets/:id",
        "events_accounts" => "/events/accounts/status",
        "events_trades" => "/events/trades",
        "events_transfers" => "/events/transfers/status",
        "events_journal" => "/events/journals/status",
        "events_nta" => "/events/nta",
    ];

    /**
     * @var \Alpaca\Api\Account
     */
    public $account;

    /**
     * @var \Alpaca\Api\Funding
     */
    public $funding;

    /**
     * @var \Alpaca\Api\Document
     */
    public $document;

    /**
     * @var \Alpaca\Api\Trade
     */
    public $trade;

    /**
     * @var \Alpaca\Api\Asset
     */
    public $asset;

    /**
     * @var \Alpaca\Api\Events
     */
    public $events;
    

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
        $this->document = (new Document($this));
        $this->trade = (new Trade($this));
        $this->asset = (new Asset($this));
        $this->events = (new Events($this));
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
            return $this->apiPaperPath;
        }

        return $this->apiPath;
    }

    /**
     * getPath()
     *
     * @return string
     */
    public function getPath($handle)
    {
        return isset($this->paths[$handle]) ? $this->version.$this->paths[$handle] : false;
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
