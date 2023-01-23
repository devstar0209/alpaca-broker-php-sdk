<?php namespace Alpaca\Account;

use Alpaca\Alpaca;

class Activity
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
     * retrieve account activities.
     * @param integer $params
     * @return JSON
     */
    public function get($params)
    {
        return $this->alpaca->request('activities', $params)->contents();
    }

    /**
     * retrieve account activities by type.
     * @param integer $activity_type
     * @return JSON
     */
    public function getByType($activity_type, $params)
    {
        $params['activity_type'] = $activity_type;
        return $this->alpaca->request('activities_type', $params)->contents();
    }
}