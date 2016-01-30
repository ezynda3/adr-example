<?php

namespace Stark\App\Providers;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;
use Aura\Payload\Payload;
use Aura\Payload_Interface\PayloadInterface;

class AppProvider extends ContainerConfig
{
    public function define(Container $di)
    {
        $di->types[PayloadInterface::class] = $di->lazyNew(Payload::class);
    }
}