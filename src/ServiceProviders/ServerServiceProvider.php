<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Server\Server;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServerServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['server'] = function ($pimple) {
            $message = new Server($pimple->getConfig('secret'));

            return $message;
        };
    }
}
