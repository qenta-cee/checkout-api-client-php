<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass;

use WirecardCheckoutApiClient\Entity\Collection;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ShippingProfileCollectionFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Collection(new ShippingProfile(), $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\ShippingProfileHydrator'));
    }

}