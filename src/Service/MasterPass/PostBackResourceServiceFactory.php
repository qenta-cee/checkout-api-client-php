<?php

namespace WirecardCheckoutApiClient\Service\MasterPass;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostBackResourceServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var $oAuth2Service OAuth2Service
         */
        $oAuth2Service = $serviceLocator->get('WirecardCheckoutApiClient\\Service\\OAuth2Service');
        /**
         * @var $httpClient Client
         */
        $httpClient = $serviceLocator->get('WirecardCheckoutApiClient\\Http\\Client');
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\Entity\MasterPass\Wallet\TransactionHydrator');
        /**
         * @var $config mixed[]
         */
        $config = $serviceLocator->get('Config');
        $baseUri = $config['rest_api']['base_uri'];

        $resourceService = new PostBackResourceService($oAuth2Service, $httpClient, $hydrator);
        $resourceService->setRequestUri(sprintf('%s/masterpass/merchants/%s/wallets/%s/transaction', $baseUri, PostBackResourceService::REPLACEMENT_MERCHANT_ID, PostBackResourceService::REPLACEMENT_WALLET_ID));
        return $resourceService;
    }

}
