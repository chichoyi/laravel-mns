<?php

namespace Chichoyi\LaravelMNS\Connectors;

use AliyunMNS\Client;
use Illuminate\Queue\Connectors\ConnectorInterface;
use Chichoyi\LaravelMNS\Adaptors\MNSAdapter;
use Chichoyi\LaravelMNS\MNSQueue;

class MNSConnector implements ConnectorInterface
{

    /**
     * Establish a queue connection.
     *
     * @param array $config
     *
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        return new MNSQueue($this->getAdaptor($config), $config['queue'], array_get($config, 'wait_seconds'));
    }


    /**
     * @param array $config
     *
     * @return mixed
     */
    protected function getEndpoint(array $config)
    {
        return str_replace('(s)', 's', $config['endpoint']);
    }


    /**
     * @param array $config
     *
     * @return Client
     */
    protected function getClient(array $config)
    {
        return new Client($this->getEndpoint($config), $config['key'], $config['secret']);
    }


    /**
     * @param array $config
     *
     * @return MNSAdapter
     */
    protected function getAdaptor(array $config)
    {
        return new MNSAdapter($this->getClient($config));
    }
}