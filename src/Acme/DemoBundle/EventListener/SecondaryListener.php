<?php

namespace Acme\DemoBundle\EventListener;

class SecondaryListener
{
    protected $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function secondaryMethod()
    {
        $this->logger->err('SecondaryListener::secondaryMethod called');
        // die('SecondaryListener::secondaryMethod called');
    }
}
