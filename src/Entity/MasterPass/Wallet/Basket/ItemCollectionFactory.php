<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\Collection;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ItemCollectionFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket
 */
class ItemCollectionFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Collection(new Item(), $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator'));
    }

}