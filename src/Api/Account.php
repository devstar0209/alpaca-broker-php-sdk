<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Account
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
     * Create an account with KYC information.
     * This will create a trading account for the end user.
     * 
     * @param JSON $params
     * 
     * @return JSON
     */
    public function create($params)
    {
        return $this->alpaca->request('accounts', $params, "POST")->contents();
    }

    /**
     * query a list of all the accounts.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getAll($params=[])
    {
        return $this->alpaca->request('accounts', $params)->contents();
    }

    /**
     * query a specific account.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function get($account_id)
    {
        return $this->alpaca->request('account', ['account_id' => $account_id])->contents();
    }

    /**
     * query a specific account.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function getTradingAccount($account_id)
    {
        return $this->alpaca->request('trading_account', ['account_id' => $account_id])->contents();
    }

    /**
     * updates account information.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function update($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('account', $params, "PATCH")->contents();
    }

    /**
     * closes an active account.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function delete($account_id)
    {
        return $this->alpaca->request('account', ['account_id' => $account_id], "DELETE")->contents();
    }

    /**
     * Get an SDK token to activate the Onfido SDK flow within your app.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function getOnfidoToken($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('onfido_token', $params)->contents();
    }

    /**
     * send Alpaca the result of the Onfido SDK flow in your app.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function updateOnfidoToken($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('update_onfido_token', $params, "PATCH")->contents();
    }

    /**
     * submit the CIP results received from your KYC provider.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function uploadCIP($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('cip', $params, "POST")->contents();
    }

    /**
     * retrieve the CIP information.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function getCIP($account_id)
    {
        return $this->alpaca->request('cip', ['account_id' => $account_id])->contents();
    }

    /**
     * retrieve account activities.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getActivities($params)
    {
        return $this->alpaca->request('activities', $params)->contents();
    }

    /**
     * retrieve account activities by type.
     * 
     * @param string $activity_type
     * @param JSON $params
     * 
     * @return JSON
     */
    public function getActivitiesByType($activity_type, $params)
    {
        $params['activity_type'] = $activity_type;
        return $this->alpaca->request('activities_type', $params)->contents();
    }
}