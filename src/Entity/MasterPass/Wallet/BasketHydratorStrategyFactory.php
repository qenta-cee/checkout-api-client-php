<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Class BasketHydratorStrategyFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet
 */
class BasketHydratorStrategyFactory implements FactoryInterface
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
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\BasketHydrator');
        $prototype = new Basket();
        $hydratorStrategy  = new EntityHydratorStrategy($hydrator, $prototype);
        return $hydratorStrategy;
    }

}