<?php namespace Alpaca\Api;

use Alpaca\Alpaca;

class Document
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
     * Uploading a Document.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function upload($account_id, $params)
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('document_upload', $params, "POST")->contents();
    }

    /**
     * Retrieving Documents for One Account.
     * 
     * @param string $account_id
     * @param JSON $params
     * 
     * @return JSON
     */
    public function get($account_id, $params=[])
    {
        $params['account_id'] = $account_id;
        return $this->alpaca->request('documents', $params)->contents();
    }

    /**
     * Retrieving Documents for One Account.
     * 
     * @param string $account_id
     * @param string $document_id
     * 
     * @return JSON
     */
    public function getById($account_id, $document_id)
    {
        $params['account_id'] = $account_id;
        $params['document_id'] = $document_id;
        return $this->alpaca->request('documents_id', $params)->contents();
    }

    /**
     * Downloading a Document.
     * 
     * @param string $account_id
     * @param string $document_id
     * 
     * @return JSON
     */
    public function download($account_id, $document_id)
    {
        $params['account_id'] = $account_id;
        $params['document_id'] = $document_id;
        return $this->alpaca->request('document_download', $params)->contents();
    }
}