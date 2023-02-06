<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Trade
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
     * Creating an Order.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function createOrder($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('orders', $params, "POST")->contents();
    }

    /**
     * Estimating an Order.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function estimateOrder($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('orders_esti', $params, "POST")->contents();
    }

    /**
     * Getting All Orders.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return array
     */
    public function getAllOrders($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('orders', $params)->contents();
    }

    /**
     * Getting an Order By Order ID.
     * 
     * @param string $account_id
     * @param string $order_id
     * @param boolean $nested
     * 
     * @return JSON
     */
    public function getOrder($account_id, $order_id, $nested=true)
    {
        $params['account_id'] = $account_id;
        $params['order_id'] = $order_id;
        $params['nested'] = $nested;
        return $this->alpaca->request('orders_id', $params)->contents();
    }

    /**
     * Getting an Order By Client Order ID.
     * 
     * @param string $account_id
     * @param string $client_order_id
     * 
     * @return JSON
     */
    public function getOrderByClient($account_id, $client_order_id)
    {
        $params['account_id'] = $account_id;
        $params['client_order_id'] = $client_order_id;
        return $this->alpaca->request('orders_client', $params)->contents();
    }

    /**
     * Updating an Order.
     * 
     * @param string $account_id
     * @param string $order_id
     * 
     * @return JSON
     */
    public function updateOrder($account_id, $order_id)
    {
        $params['account_id'] = $account_id;
        $params['order_id'] = $order_id;
        return $this->alpaca->request('orders_id', $params)->contents();
    }

    /**
     * Delete All Orders.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function deleteAllOrders($account_id)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('orders', $params, 'DELETE')->contents();
    }

    /**
     * Delete an Order.
     * 
     * @param string $account_id
     * @param string $order_id
     * 
     * @return JSON
     */
    public function deleteOrder($account_id, $order_id)
    {
        $params['account_id'] = $account_id;
        $params['order_id'] = $order_id;
        return $this->alpaca->request('orders_id', $params, 'DELETE')->contents();
    }

    /**
     * Getting All Positions.
     * 
     * @param string $account_id
     * 
     * @return array
     */
    public function getAllPositions($account_id)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('positions', $params)->contents();
    }

    /**
     * Getting an Open Position.
     * 
     * @param string $account_id
     * @param string $symbol
     * 
     * @return JSON
     */
    public function getOpenPosition($account_id, $symbol)
    {
        $params['account_id'] = $account_id;
        $params['symbol'] = $symbol;
        return $this->alpaca->request('positions_symbol', $params)->contents();
    }

    /**
     * Close All Positions.
     * 
     * @param string $account_id
     * @param boolean $cancel
     * 
     * @return JSON
     */
    public function closeAllPositions($account_id, $cancel=true)
    {
        $params['account_id'] = $account_id;
        $params['cancel_orders'] = $cancel;
        return $this->alpaca->request('positions', $params, 'DELETE')->contents();
    }

    /**
     * Close a Position.
     * 
     * @param string $account_id
     * @param string $symbol
     * @param JSON $params
     * 
     * @return JSON
     */
    public function closePosition($account_id, $symbol, $params=[])
    {
        $params['account_id'] = $account_id;
        $params['symbol'] = $symbol;
        return $this->alpaca->request('positions_symbol', $params, 'DELETE')->contents();
    }

    /**
     * Bulk fetching all accounts positions.
     * 
     * @param integer $page
     * 
     * @return array
     */
    public function getAllAccountsPositions($page)
    {
        $params['page'] = $page;
        return $this->alpaca->request('positions_all', $params)->contents();
    }

    /**
     * Getting Account Portfolio History.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return array
     */
    public function getPortfolioHistories($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('portfolio', $params)->contents();
    }

    /**
     * Creating an Watchlist.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function createWatchlist($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('watchlists', $params, "POST")->contents();
    }

    /**
     * Getting a Watchlist.
     * 
     * @param string $account_id
     * 
     * @return array
     */
    public function getWatchlists($account_id)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('watchlists', $params)->contents();
    }

    /**
     * Getting a Watchlist by Watchlist ID.
     * 
     * @param string $account_id
     * @param string $watchlist_id
     * 
     * @return array
     */
    public function getWatchlistById($account_id, $watchlist_id)
    {
        $params['account_id'] = $account_id;
        $params['watchlist_id'] = $watchlist_id;
        return $this->alpaca->request('watchlists_id', $params)->contents();
    }

    /**
     * Updating a Watchlist.
     * 
     * @param string $account_id
     * @param string $watchlist_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function updateWatchlist($account_id, $watchlist_id, $params)
    {
        $params['account_id'] = $account_id;
        $params['watchlist_id'] = $watchlist_id;
        return $this->alpaca->request('watchlists_id', $params, 'PUT')->contents();
    }

    /**
     * Adding an Asset to a Watchlist.
     * 
     * @param string $account_id
     * @param string $watchlist_id
     * @param array $assets
     * 
     * @return JSON
     */
    public function addAssetsToWatchlist($account_id, $watchlist_id, $assets=[])
    {
        $params['account_id'] = $account_id;
        $params['watchlist_id'] = $watchlist_id;
        $params['symbol'] = $assets;
        return $this->alpaca->request('watchlists_id', $params, 'PUT')->contents();
    }

    /**
     * Removing a Symbol from a Watchlist.
     * 
     * @param string $account_id
     * @param string $watchlist_id
     * @param string $symbol
     * 
     * @return JSON
     */
    public function removeSymbolFromWatchlist($account_id, $watchlist_id, $symbol)
    {
        $params['account_id'] = $account_id;
        $params['watchlist_id'] = $watchlist_id;
        $params['symbol'] = $symbol;
        return $this->alpaca->request('watchlists_symbol', $params, 'DELETE')->contents();
    }

    /**
     * Delete a Watchlist.
     * 
     * @param string $account_id
     * @param string $watchlist_id
     * 
     * @return JSON
     */
    public function deleteWatchlist($account_id, $watchlist_id)
    {
        $params['account_id'] = $account_id;
        $params['watchlist_id'] = $watchlist_id;
        return $this->alpaca->request('watchlists_id', $params, 'DELETE')->contents();
    }

    /**
     * Setting Margin Multiplier
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function setMargin($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('set_margin', $params, 'PATCH')->contents();
    }
}