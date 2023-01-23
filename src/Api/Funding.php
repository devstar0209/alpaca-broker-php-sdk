<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Funding
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
     * Creating an ACH Relationship.
     * 
     * @param JSON $params
     * 
     * @return JSON
     */
    public function createAchRelationship($params)
    {
        return $this->alpaca->request('ach_relationships', $params, "POST")->contents();
    }

    /**
     * retrieve ACH Relationships for Account.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function getAchRelationships($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('ach_relationships', $params)->contents();
    }

    /**
     * Deleting an ACH Relationship.
     * 
     * @param string $account_id
     * @param string $relationship_id
     * 
     * @return JSON
     */
    public function deleteAchRelationship($account_id, $relationship_id)
    {
        $params['account_id'] = $account_id;
        $params['relationship_id'] = $relationship_id;
        return $this->alpaca->request('ach_relationships_delete', $params, 'DELETE')->contents();
    }

    /**
     * Creating a New Bank Relationship.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function createBankRelationship($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('recipient_banks', $params, "POST")->contents();
    }

    /**
     * Retrieving Bank Relationship Details for Account.
     * 
     * @param string $account_id
     * 
     * @return JSON
     */
    public function getBankRelationships($account_id)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('recipient_banks', $params)->contents();
    }

    /**
     * Deleting a Bank Relationship.
     * 
     * @param string $account_id
     * @param string $bank_id
     * 
     * @return JSON
     */
    public function deleteBankRelationship($account_id, $bank_id)
    {
        $params['account_id'] = $account_id;
        $params['bank_id'] = $bank_id;
        return $this->alpaca->request('recipient_banks_delete', $params, 'DELETE')->contents();
    }

    /**
     * Retrieving Daily Trading Limits.
     * 
     * @return JSON
     */
    public function getDailyTradingLimits()
    {
        return $this->alpaca->request('jit_limits')->contents();
    }

    /**
     * Retrieving JIT Ledgers.
     * 
     * @return JSON
     */
    public function getJitLedgers()
    {
        return $this->alpaca->request('jit_ledgers')->contents();
    }

    /**
     * Retrieving JIT Ledger Balances.
     * 
     * @param string $ledger_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function getJitLedgerBalances($ledger_id, $params)
    {
        $params['ledger_id'] = $ledger_id;
        return $this->alpaca->request('jit_balances', $params)->contents();
    }

    /**
     * Creating a Transfer Entity.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function createTransferEntity($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('transfers', $params, 'POST')->contents();
    }

    /**
     * Retrieving All Transfers by Account.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function getAllTransfersByAccount($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('transfers', $params)->contents();
    }

    /**
     * Deleting a Transfer .
     * 
     * @param string $account_id
     * @param string $transfer_id
     * 
     * @return JSON
     */
    public function deleteTransfer($account_id, $transfer_id)
    {
        $params['account_id'] = $account_id;
        $params['transfer_id'] = $transfer_id;
        return $this->alpaca->request('transfers_delete', $params, 'DELETE')->contents();
    }
}