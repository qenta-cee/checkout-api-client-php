<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Class ItemHydratorStategyFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket
 */
class ItemHydratorStrategyFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var $hydrator HydratorInterface
         */
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemHydrator');
        $prototype = new Item();
        return new EntityHydratorStrategy($hydrator, $prototype);
    }

}