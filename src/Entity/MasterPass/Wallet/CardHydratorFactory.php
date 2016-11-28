<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;

/**
 * Class CardHydratorFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet
 */
class CardHydratorFactory implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new ClassMethods(false);

        /**
         * @var $plainHydratorStrategy EntityHydratorStrategy
         */
        $plainHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Card\\PlainHydratorStrategy');
        $hydrator->addStrategy('plainCard', $plainHydratorStrategy);
        return $hydrator;
    }

}