<?php

namespace Acme\DemoBundle\EventListener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Acme\DemoBundle\Twig\Extension\DemoExtension;

class ControllerListener
{
    protected $extension;
    protected $dispatcher;

    public function __construct(DemoExtension $extension, $dispatcher)
    {
        $this->extension = $extension;
        $this->dispatcher = $dispatcher;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
            $this->extension->setController($event->getController());
        }
        $this->dispatcher->dispatch(
            'acme.demo.secondary_event', new Event()
        );
    }
}
