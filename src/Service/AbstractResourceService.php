<?php
namespace WirecardCheckoutApiClient\Service;

use WirecardCheckoutApiClient\Entity\Collection;
use WirecardCheckoutApiClient\Entity\EntityInterface;
use WirecardCheckoutApiClient\Exception\UnsupportedFeatureException;
use Zend\Http\Client;
use Zend\Http\Headers;
use Zend\Http\Request;
use Zend\Json\Json;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\HydratorInterface;
use WirecardCheckoutApiClient\Exception\ExceptionInterface;
use WirecardCheckoutApiClient\Exception\RuntimeException;

//TODO: instead of an Abstract Service a client which is used by the ResourceServices whould be cleaner
/**
 * Class AbstractResourceService
 * @package WirecardCheckoutApiClient\Service
 */
abstract class AbstractResourceService implements ResourceServiceInterface
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * @var OAuth2Service
     */
    protected $oAuth2Service;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $requestUri;

    /**
     * Constructor
     *
     * @param OAuth2Service $oAuth2Service
     * @param Client $httpClient
     * @param HydratorInterface $hydrator
     */
    public function __construct(OAuth2Service $oAuth2Service, Client $httpClient, HydratorInterface $hydrator = null)
    {
        $this->setOAuth2Service($oAuth2Service);
        $this->setHttpClient($httpClient);
        $this->setHydrator($hydrator ?: new ClassMethods());
    }

    /**
     * Set hydrator
     *
     * @param  HydratorInterface $hydrator
     * @return AbstractResourceService
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * Retrieve hydrator
     *
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param OAuth2Service $oAuth2Service
     * @return AbstractResourceService
     */
    public function setOAuth2Service(OAuth2Service $oAuth2Service)
    {
        $this->oAuth2Service = $oAuth2Service;
        return $this;
    }

    /**
     * @return OAuth2Service
     */
    public function getOAuth2Service()
    {
        return $this->oAuth2Service;
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @return ResourceServiceInterface
     */
    public function setAuthenticationCredentials($clientId, $clientSecret)
    {
        $this->clientId = (string)$clientId;
        $this->clientSecret = (string)$clientSecret;
    }

    /**
     * @return string
     * @throws ExceptionInterface
     */
    protected function getAccessToken()
    {
        return $this->oAuth2Service->getAccessToken($this->clientId, $this->clientSecret);
    }

    /**
     * setter for the used http client
     *
     * @param Client $client
     * @return $this
     */
    public function setHttpClient(Client $client)
    {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * getter for the used http client
     *
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param $requestUri
     * @return $this
     */
    public function setRequestUri($requestUri)
    {
        $this->requestUri = (string)$requestUri;
        return $this;
    }

    /**
     * @param string[] $replacements
     * @return string
     */
    public function getRequestUri(array $replacements =  Array())
    {
        $requestUri = $this->requestUri;
        foreach($replacements AS $search => $replacement)
        {
            $requestUri = str_replace($search, (string)$replacement, $requestUri);
        }
        return $requestUri;
    }


    /**
     * call endpoint POST to create a new Resource instance
     *
     * @param EntityInterface $entity
     * @return EntityInterface
     * @throws UnsupportedFeatureException
     */
    public function create(EntityInterface $entity)
    {
        throw new UnsupportedFeatureException(sprintf('Method create has not been implemented by %s.', get_called_class()));
    }

    /**
     * call resource endpoint GET to get the given Resource instances latest data
     *
     * @param EntityInterface $entity
     * @return mixed
     * @throws UnsupportedFeatureException
     */
    public function get(EntityInterface $entity)
    {
        throw new UnsupportedFeatureException(sprintf('Method get has not been implemented by %s.', get_called_class()));
    }

    /**
     * call resource endpoint DELETE to remove the given Resource
     *
     * @param EntityInterface $entity
     * @return mixed
     * @throws UnsupportedFeatureException
     */
    public function delete(EntityInterface $entity)
    {
        throw new UnsupportedFeatureException(sprintf('Method delete has not been implemented by %s.', get_called_class()));
    }

    /**
     * call endpoint GET to get a collection of Resources
     *
     * @param Collection $collection
     * @return mixed
     * @throws UnsupportedFeatureException
     */
    public function getList(Collection $collection)
    {
        throw new UnsupportedFeatureException(sprintf('Method getList has not been implemented by %s.', get_called_class()));
    }

    /**
     * @param array $options
     * @return Client
     */
    protected function getPreparedHttpClient(Array $options) {
        $client = $this->getHttpClient();
        $client->resetParameters(true);
        $headers = new Headers();
        foreach($options As $key => $value)
        {
            switch($key)
            {
                case self::OPTIONS_METHOD:
                    $client->setMethod($value);
                    if($value == Request::METHOD_POST) {
                        $headers->addHeaderLine('Content-Type', 'application/json');
                    }
                    break;
                case self::OPTIONS_REQUEST_URI:
                    $client->setUri($value);
                    break;
                case self::OPTIONS_ACCESS_TOKEN:
                    $headers->addHeaderLine('Authorization', sprintf('Bearer %s', $value));
                    break;
                case self::OPTIONS_REQUEST_BODY:
                    $client->setRawBody($value);
                    break;
            }
        }
        $headers->addHeaderLine('Accept', 'application/json');
        $client->setHeaders($headers);

        return $client;
    }

    /**
     * @param Client $client
     * @return string[]
     * @throws RuntimeException
     */
    protected function sendRequest(Client $client) {
        try {
            $responseObject = $client->send();
            $responseArray = Json::decode($responseObject->getBody(), Json::TYPE_ARRAY);
        } catch (\RuntimeException $e) {
            throw new RuntimeException($e->getMessage(), 502, $e);
        }
        if($responseObject->getStatusCode() >= 400) {
            $message = '';
            $errorCode = $responseObject->getStatusCode();
            if(array_key_exists('errorCode', $responseArray)) {
                $message .= $responseArray['errorCode'] . ': ';
                $errorCode = $responseArray['errorCode'];
            }
            if(array_key_exists('errorMessage', $responseArray)) {
                $message .= $responseArray['errorMessage'];
            } else if(array_key_exists('message', $responseArray)) {
                $message .= $responseArray['message'];
            }
            throw new RuntimeException($message, $errorCode);
        }

        return $responseArray;
    }
}