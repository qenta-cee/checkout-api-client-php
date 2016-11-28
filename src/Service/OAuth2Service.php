<?php
namespace WirecardCheckoutApiClient\Service;

use WirecardCheckoutApiClient\Exception\InvalidArgumentException;
use WirecardCheckoutApiClient\Exception\RuntimeException;
use Zend\Http\Client;
use Zend\Http\Request;
use Zend\Json\Json;
use Zend\Http\Exception\InvalidArgumentException AS ZendHttpInvalidArgumentException;

/**
 * Class OAuth2Service
 * @package WirecardCheckoutApiClient\Service
 */
class OAuth2Service implements HttpServiceInterface
{
    const GRANT_TYPE_CLIENT_CREDENTIALS = 'client_credentials';

    const OPTIONS_CLIENT_ID = 'client_id';

    const OPTIONS_CLIENT_SECRET = 'client_secret';

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $requestUri;


    /**
     * Constructor
     *
     * @param $requestUri
     * @param Client|null $httpClient
     */
    public function __construct($requestUri, Client $httpClient = null) {
        $this->setRequestUri($requestUri);
        $this->setHttpClient($httpClient ?: new Client());
    }

    /**
     * setter for the used http client
     *
     * @param Client $client
     * @return $this
     */
    public function setHttpClient(Client $client) {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * getter for the used http client
     *
     * @return Client
     */
    public function getHttpClient() {
        return $this->httpClient;
    }

    /**
     * setter for the request uri used to retrieve the accessToken
     *
     * @param string $requestUri
     * @return OAuth2Service $this
     */
    public function setRequestUri($requestUri) {
        $this->requestUri = (string)$requestUri;
        return $this;
    }

    /**
     * getter for the request uri used to retrieve the accessToken
     *
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * retrive the access token with given client credentials from the OAuth2 server
     *
     * @param $clientId
     * @param $clientSecret
     * @return string
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function getAccessToken($clientId, $clientSecret) {
        $client = $this->getPreparedHttpClient(Array(
            self::OPTIONS_METHOD => Request::METHOD_POST,
            self::OPTIONS_CLIENT_ID => $clientId,
            self::OPTIONS_CLIENT_SECRET => $clientSecret,
            self::OPTIONS_PARAMETERS => Array('grant_type' => self::GRANT_TYPE_CLIENT_CREDENTIALS),
            self::OPTIONS_REQUEST_URI => $this->getRequestUri(),
        ));

        //TODO: code duplication of AbstractResourceService::sendRequest()
        try {
            $responseObject = $client->send();
            $responseArray = Json::decode($responseObject->getBody(), Json::TYPE_ARRAY);
        } catch (\RuntimeException $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
        if($responseObject->getStatusCode() >= 400) {
            $message = '';
            if(array_key_exists('error', $responseArray)) {
                $message .= $responseArray['error'] . ': ';
            }
            if(array_key_exists('message', $responseArray)) {
                $message .= $responseArray['message'];
            }
            throw new RuntimeException($message, $responseObject->getStatusCode());
        }

        return (string)$responseArray['access_token'];
    }

    /**
     * @param array $options
     * @return Client
     * @throws InvalidArgumentException
     */
    protected function getPreparedHttpClient(Array $options) {
        //TODO: code duplication of AbstractResourceService::getPreparedHttpClient()
        $client = $this->getHttpClient();
        $client->resetParameters(true);
        $client->setMethod($options[self::OPTIONS_METHOD]);
        try {
            $client->setAuth($options[self::OPTIONS_CLIENT_ID], $options[self::OPTIONS_CLIENT_SECRET]);
        } catch (ZendHttpInvalidArgumentException $e) {
            throw new InvalidArgumentException($e->getMessage(), $e->getCode(), $e);
        }
        $client->setParameterPost($options[self::OPTIONS_PARAMETERS]);
        $client->setUri($options[self::OPTIONS_REQUEST_URI]);

        return $client;
    }
}