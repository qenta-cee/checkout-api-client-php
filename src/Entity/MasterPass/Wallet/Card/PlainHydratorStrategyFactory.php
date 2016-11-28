<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Card;

use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PlainHydratorStrategyFactory implements FactoryInterface {

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
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Card\\PlainHydrator');
        $prototype = new Plain();
        $hydratorStrategy  = new EntityHydratorStrategy($hydrator, $prototype);
        return $hydratorStrategy;
    }

}