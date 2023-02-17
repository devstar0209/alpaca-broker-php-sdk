<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Events
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
     *  Listen to events related to change of account status.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getAccountsStatus($params=[])
    {
        return $this->alpaca->request('events_accounts', $params, 'STREAM')->contents();
    }

    /**
     *  Listen to events related to limit trades.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getTradesStatus($params=[])
    {
        return $this->alpaca->request('events_trades', $params, 'STREAM')->contents();
    }

    /**
     *  Listen to events related to transfers.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getTransfersStatus($params=[])
    {
        return $this->alpaca->request('events_transfers', $params, 'STREAM')->contents();
    }

    /**
     *  Listen to events related to journal.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getJournalStatus($params=[])
    {
        return $this->alpaca->request('events_journal', $params, 'STREAM')->contents();
    }

    /**
     *  Listen to when NTAs are pushed such as CSDs, JNLC (journals) or FEEs.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function getNtaStatus($params=[])
    {
        return $this->alpaca->request('events_nta', $params, 'STREAM')->contents();
    }

}