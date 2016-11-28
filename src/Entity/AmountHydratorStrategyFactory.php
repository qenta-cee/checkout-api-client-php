<?php
namespace WirecardCheckoutApiClient\Entity;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Class AmountHydratorStrategyFactory
 * @package WirecardCheckoutApiClient\Entity
 */
class AmountHydratorStrategyFactory implements FactoryInterface
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
        $hydrator = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\AmountHydrator');
        $prototype = new Amount();
        return new EntityHydratorStrategy($hydrator, $prototype);
    }

}