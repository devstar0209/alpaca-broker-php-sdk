<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Asset
{
    /**
     * @var \Alpaca\Alpaca
     */
    protected $alpaca;

    /**
     * Construct
     */
    public function __construct(Alpaca $alpaca)
    {
        $this->alpaca = $alpaca;
    }

    /**
     * Retrieving All Assets.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getAssetsAll($params=[])
    {
        return $this->alpaca->request('assets', $params)->contents();
    }

    /**
     * Retrieving an Asset by Symbol.
     * 
     * @param string $symbol
     * 
     * @return JSON
     */
    public function getAssetBySymbol($symbol)
    {
        $params['symbol'] = $symbol;
        return $this->alpaca->request('assets_symbol', $params)->contents();
    }

    /**
     * Retrieving an Asset by ID.
     * 
     * @param string $id
     * 
     * @return JSON
     */
    public function getAssetById($id)
    {
        $params['id'] = $id;
        return $this->alpaca->request('assets_id', $params)->contents();
    }
}