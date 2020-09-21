<?php

namespace Laraver\Eleme\Oauth;

use Laraver\Eleme\Core\Api as CoreApi;
use Symfony\Component\HttpFoundation\Request;

class Api extends CoreApi
{
    /**
     * The request token.
     *
     * @var AuthorizerAccessToken
     */
    public $accessToken;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var string
     */
    protected $redirectUrl;

    public function __construct(AuthorizerAccessToken $accessToken)
    {
        parent::__construct($accessToken);
    }

    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * get a code from redirect uri.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->request->get('code');
    }

    /**
     * get a state from redirect uri.
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->request->get('state');
    }

    /**
     * @param $redirectUrl
     * @return $this
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * @param null $authCode
     * @param bool $refresh
     *
     * @param null $redirectUrl
     * @return mixed|string
     */
    public function getToken($authCode = null, $refresh = false)
    {
        return $this->accessToken->getTokenFromServer($authCode, $refresh, $this->redirectUrl);
    }
}
