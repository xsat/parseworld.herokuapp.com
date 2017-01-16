<?php

namespace Server;

use Curl\Curl;

/**
 * Server/Parser
 *
 * @property \Curl\Curl $curl
 */
class Parser
{
    private $curl = null;

    /**
     * @return null
     */
    public function __construct()
    {
        $this->curl = new Curl();
    }

    /**
     * @return null
     */
    public function main()
    {
        Log::append(1);
        Log::append(2);
        Log::append(3);
    }
}