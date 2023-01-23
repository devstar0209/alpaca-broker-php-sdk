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
     * @param JSON $params
     * @return JSON
     */
    public function create($params)
    {
        return $this->alpaca->request('accounts', $params, "POST")->contents();
    }

    /**
     * query a list of all the accounts
     * @return JSON
     */
    public function getAll()
    {
        return $this->alpaca->request('accounts')->contents();
    }

    /**
     * query a specific account.
     * @param integer $id
     * @return JSON
     */
    public function get($id)
    {
        return $this->alpaca->request('account', ['id' => $id])->contents();
    }

    /**
     * query a specific account.
     * @param integer $id
     * @return JSON
     */
    public function getTradingAccount($id)
    {
        return $this->alpaca->request('trading_account', ['id' => $id])->contents();
    }

    /**
     * updates account information.
     * @param integer $id
     * @param JSON $params
     * @return JSON
     */
    public function update($id, $params)
    {
        $params['id'] = $id;
        return $this->alpaca->request('account', $params, "PATCH")->contents();
    }

    /**
     * closes an active account.
     * @param integer $id
     * @return JSON
     */
    public function delete($id)
    {
        return $this->alpaca->request('account', ['id' => $id], "DELETE")->contents();
    }

    /**
     * Get an SDK token to activate the Onfido SDK flow within your app.
     * @param integer $id
     * @return JSON
     */
    public function getOnfidoToken($id)
    {
        return $this->alpaca->request('onfido_token', ['id' => $id])->contents();
    }

    /**
     * send Alpaca the result of the Onfido SDK flow in your app.
     * @param integer $id
     * @param JSON $params
     * @return JSON
     */
    public function updateOnfidoToken($id, $params)
    {
        $params['id'] = $id;
        return $this->alpaca->request('update_onfido_token', $params, "PATCH")->contents();
    }

    /**
     * submit the CIP results received from your KYC provider.
     * @param integer $id
     * @param JSON $params
     * @return JSON
     */
    public function uploadCIP($id, $params)
    {
        $params['id'] = $id;
        return $this->alpaca->request('cip', $params, "POST")->contents();
    }

    /**
     * retrieve the CIP information
     * @param integer $id
     * @return JSON
     */
    public function getCIP($id)
    {
        return $this->alpaca->request('cip', ['id' => $id])->contents();
    }

    /**
     * retrieve account activities.
     * @param integer $params
     * @return JSON
     */
    public function getActivities($params)
    {
        return $this->alpaca->request('activities', $params)->contents();
    }

    /**
     * retrieve account activities by type.
     * @param integer $activity_type
     * @return JSON
     */
    public function getActivitiesByType($activity_type, $params)
    {
        $params['activity_type'] = $activity_type;
        return $this->alpaca->request('activities_type', $params)->contents();
    }
}