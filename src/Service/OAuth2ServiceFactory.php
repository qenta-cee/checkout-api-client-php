<?php
namespace WirecardCheckoutApiClient\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\Exception\ServiceNotFoundException;

/**
 * Class OAuth2ServiceFactory
 * @package WirecardCheckoutApiClient\Service
 */
class OAuth2ServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @throws ServiceNotFoundException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $httpClient = $serviceLocator->get('WirecardCheckoutApiClient\\Http\\Client');

        /**
         * @var $config mixed[]
         */
        $config = $serviceLocator->get('Config');
        $baseUri = $config['rest_api']['base_uri'];
        $requestUri = sprintf('%s/oauth/token', $baseUri);
        $oAuth2Service = new OAuth2Service($requestUri, $httpClient);
        return $oAuth2Service;
    }

}