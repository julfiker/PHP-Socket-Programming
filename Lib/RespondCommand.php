<?php
namespace Lib;

class RespondCommand  {
    /**
     * @var $client
     */
    private $client;

    /**
     * @var $respondTime
     */
    private $respondTime;

    /**
     * Injected client and respondTime object
     *
     * @param $client
     * @param $respondTime
     */
    public function __construct($client, $respondTime) {
        $this->respondTime = $respondTime;
        $this->client = $client;
    }

    /**
     * Command for UPTIME
     */
    public function runUptime() {
        $output = "It has been running for ". $this->respondTime->getTime(time())."\n";
        socket_write($this->client, $output);
    }

    /**
     * Command for REQUESTS
     *
     * @param array $requests
     */
    public function runRequests(array $requests) {
        $output = "It has been served for ". count($requests)." clients request\n";
        socket_write($this->client, $output);
    }

    /**
     * Command for CLIENTS
     *
     * @param array $requests
     */
    public function runClients(array $requests) {
        $output = $output = "It has been served for ". count($requests)." unique clients request\n";
        socket_write($this->client, $output);
    }

    /**
     * Command for STOP, that will be executed all command
     *
     * @param array $requests
     */
    public  function runAll(array $requests) {
        $this->runUptime();
        $this->runRequests($requests);
        $this->runClients($requests);
    }
} 