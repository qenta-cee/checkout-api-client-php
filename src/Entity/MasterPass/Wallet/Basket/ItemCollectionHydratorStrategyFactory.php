<?php
namespace WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket;

use WirecardCheckoutApiClient\Entity\CollectionHydratorStrategy;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use WirecardCheckoutApiClient\Entity\Collection;

/**
 * Class ItemCollectionHydratorStrategyFactory
 * @package WirecardCheckoutApiClient\Entity\MasterPass\Wallet\Basket
 */
class ItemCollectionHydratorStrategyFactory implements FactoryInterface
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
         * @var Collection
         */
        $collection = $serviceLocator->get('WirecardCheckoutApiClient\\Entity\\MasterPass\\Wallet\\Basket\\ItemCollection');
        return new CollectionHydratorStrategy($collection);
    }

}