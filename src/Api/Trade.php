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
     * @return JSON
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
}