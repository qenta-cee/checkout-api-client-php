<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use WirecardCheckoutApiClient\Entity\EntityHydratorStrategy;
use WirecardCheckoutApiClient\Entity\CollectionHydratorStrategy;

/**
 * Class BasketHydratorFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass
 */
class BasketHydratorFactory implements FactoryInterface
{
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
         * @var $amountHydratorStrategy EntityHydratorStrategy
         */
        $amountHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\AmountHydratorStrategy');
        /**
         * @var $itemCollectionHydratorStrategy CollectionHydratorStrategy
         */
        $itemCollectionHydratorStrategy = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollectionHydratorStrategy');
        $hydrator->addStrategy('totalAmount', $amountHydratorStrategy);
        $hydrator->addStrategy('items', $itemCollectionHydratorStrategy);
        return $hydrator;
    }

}