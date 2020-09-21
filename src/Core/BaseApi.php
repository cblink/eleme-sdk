<?php


namespace Laraver\Eleme\Core;


use Hanson\Foundation\Foundation;

class BaseApi extends Api
{
    /**
     * @var Foundation
     */
    protected $app;

    /**
     * Constructor.
     *
     * @param Foundation $app
     */
    public function __construct(Foundation $app)
    {
        $this->app = $app;

        $this->setAccessToken($app['access_token']);
    }
}
